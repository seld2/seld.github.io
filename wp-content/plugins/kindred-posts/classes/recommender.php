<?php
/**
 *
 * Start kp_recommender class
 *
 **/
class kp_recommender {
	public $ipAddress = ""; // The IP Address of the user making the request
	public $userAgent = ""; // The user's user agent
	public $posts = array(); // An array of kp_recommendedPost objects that were recommended for this user
	public $template = ""; 	// A template of how the posts should be rendered
							// In order to render the posts, the template must contain {Posts}
	public $randomness = 10; // Degree of randomness from 0 to 100. Lower means less random

	public function __construct($ipAddress = "", $userAgent = ""){
		$this->ipAddress = $ipAddress;
		$this->userAgent = $userAgent;
	}

	/**
	 * Get the distance between two user's visit data
	 *
	 * @param array $user1
	 * @param array $user2
	 * @return float: The distance
	 **/
	public function getDistance($user1, $user2) {
		$dist = 0;

		if (count($user1) <= 1 || count($user2) <= 1) {
			return 100.0;
		}

		foreach ($user1 as $postID1 => $NumVisits1) {
			// Find the $postID1 in the other user
			if (isset($user2[$postID1])) {
				$NumVisits2 = $user2[$postID1];
			} else {
				$NumVisits2 = 0;
			}

			// Compare the distance
			$dist += pow($NumVisits1 - $NumVisits2, 2);
			unset($user1[$postID1]);
			unset($user2[$postID1]);
		}

		foreach ($user2 as $postID2 => $NumVisits2) {
			// We went through $user1 so we know $NumVisits1 = 0
			$NumVisits1 = 0;

			// Compare the distance
			$dist += pow($NumVisits1 - $NumVisits2, 2);
		}

		if ($dist < 0) {
			return 0.0;
		}

		return sqrt($dist);
	}

	/**
	 * Return an array of recommended posts as WP_Posts
	 *
	 * @return Array: An array of WP_Posts
	 *
	 * @since 1.2.5
	 */
	public function getRecommendedWP_Posts() {
		$wpPosts = array();
		foreach ($this->posts as $rpPost) {
			$wpPosts[] = $rpPost->post;
		}

		return $wpPosts;
	}

	/**
	 * Return the specified Recommended Post object by $postID
	 *
	 * @param int $postID The post to search for
	 *
	 * @return recommendedPost
	 *
	 * @since 1.2.5
	 */
	public function getRecommendedPost($postID) {
		foreach ($this->posts as $rpPost) {
			if ($rpPost->post->ID == $postID) {
				return $rpPost;
			}
		}

		return null;
	}

	/**
	 * Check if $this->posts contains $postID
	 *
	 * @param int $postID: The post we are interested in
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	public function isPostRecommended($postID) {
		foreach ($this->posts as $rpPost) {
			if ($rpPost->post->ID == $postID) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Render the recommended posts, either using $this->template or the rendered posts
	 *
	 * @param string $template: The template to use to render (must contain {kp_recommendedPosts} to generate a list of posts)
	 * @param Array $data: Data that should be used in rendering
	 * @return string: The rendered Html
	 **/
	public function render($template = "", $data = array()) {
		return kp_recommender::renderPosts($this->posts, $template, $data);
	}

	/**
	 * Render the recommended posts, either using $this->template or the rendered posts
	 *
	 * @param Array $posts: An array of recommendedPost objects to render
	 * @param string $template: The template to use to render (must contain {kp_recommendedPosts} to generate a list of posts)
	 * @param Array $data: Data that should be used in rendering
	 * @return string: The rendered Html
	 **/
	public static function renderPosts($posts, $template = "", $data = array()) {
		global $kp_templates;
		if ($template == "" && isset($kp_templates["kp_recommender"])){
			$template = $kp_templates["kp_recommender"];
		}

		$postsHtml = "";
		foreach ($posts as $post) {
			$postsHtml .= $post->render("", $data);
		}
		$data["kp_recommendedPosts"] = $postsHtml;

		return kp_renderer::render($template, $data);
	}

	/**
	 * Run the recommendation engine and fill $posts with recommendedPosts objects
	 *
	 * @param int $numToRecommend: The number of posts to recommend
	 * @param int $numClosestUsersToUse: The number of users to use when recommending posts (more is less efficient)
	 * @param array<string> $recommendablePostTypes: An array of post types to recommend (if empty, recommend all post types)
	 * @param bool $testModeValue: Indicates if we are in test mode and what value to look for
	 * @return null
	 */
	public function run($numPostsToRecommend = 5, $numClosestUsersToUse = -1, $recommendablePostTypes = array(), $testModeValue = null){
		// Get the unique posts and counts for each user
		global $visitTbl, $wpdb, $defaultNumClosestUsersToUse, $maxPastUpdateDate;

		// Check if the user is currently on a post, if not, set the current post to -1
		if (!isset($curr_post_id)){
			$curr_post_id = -1; // This is so $curr_post_id can be used later
		}

		// Check if a value was passed in the function or default to the config value set in numClosestUsers
		if ($numClosestUsersToUse < 0){
			$numClosestUsersToUse = $defaultNumClosestUsersToUse;
		}

		// Determine if we are test mode and an admin, if so, display the test mode data
		$isAdmin = kp_isUserAdmin();
		if (!isset($testModeValue)) {
			$isTestMode = (get_option("kp_AdminTestMode", "false") == "true" && $isAdmin);
			if ($isTestMode) {
				$testModeValue = "1";
			} else {
				$testModeValue = "0";
			}
		}

		// Reset the recommended posts
		$this->posts = array();
		$randomness = $this->randomness;

		// Get the user's visit data
		$userVisits = kp_visits::getSingleUserVisits($this->ipAddress, $this->userAgent, $testModeValue);
		$userVisits = $userVisits[0]; // The [0] might cause an issue

		// Set up the closest number of users
		$closestUsers = array();

		// Get the other users
		$otherUsers = kp_visits::getVisits(array(), array(), $testModeValue, $maxPastUpdateDate, array($this->ipAddress), array($this->userAgent));

		foreach ($otherUsers as $otherUser) {
			// Get the distance between the user and the other users
			$dist = $this->getDistance($userVisits, $otherUser);

			if (count($closestUsers) < $numClosestUsersToUse) {
				array_push($closestUsers, array($otherUser, $dist));

			} else {
				// Find the max dist and replace it
				$maxDist = -1;
				$maxInd = 0;

				$i = 0;
				foreach($closestUsers as $tempUser) {
					if ($tempUser[1] > $maxDist && $tempUser[1] > $dist) {
						$maxDist = $tempUser[1];
						$maxInd = $i;
					}
					$i = i + 1;
				}

				// Unset that array element and push our new close user
				if ($maxDist != -1) {
					unset($closestUsers[$maxInd]);
					$closestUsers[$maxInd] = array($otherUser, $dist);
				}
			}
		}

		// Build the criteria for the post types to recommend
		$preparedPostTypes = "";
		$preparedPostTypesArray = array();
		$preparedPostTypeCriteria = "";
		if (count($recommendablePostTypes) > 0) {
			foreach ($recommendablePostTypes as $postType) {
				if ($preparedPostTypes != "") {
					$preparedPostTypes = $preparedPostTypes . ", ";
				}

				$preparedPostTypes = $preparedPostTypes . "%s";
				$preparedPostTypesArray[] = $postType;
			}

			$preparedPostTypeCriteria  = " post_type IN (" . $preparedPostTypes . ") AND";
		}

		// Get a list of posts that we can recommend
		$allPosts = array();
		$recommendablePosts = array();
		$posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE $preparedPostTypeCriteria post_status = 'publish' AND post_parent = '0'", $preparedPostTypesArray), OBJECT);

		foreach ($posts as $post) {
			$recommendablePosts[$post->ID] = true;
			$allPosts[$post->ID] = true;
		}

		// Remove the current post
		if (isset($recommendablePosts[$curr_post_id])) {
			unset($recommendablePosts[$curr_post_id]);
		}

		// Remove posts that the user has already visited
		if ($userVisits != null && count($userVisits) > 0) {
			foreach ($userVisits as $postId => $numVisits) {
				if (isset($recommendablePosts[$postId])) {
					unset($recommendablePosts[$postId]);
				}
			}
		}

		if (count($closestUsers) > 0) {
			// Get the visited posts from the $closestUsers
			$visitCounts = array(); // will contain {1=>5, 2=>3, 5=>150, post_id=>total visit number}

			foreach ($closestUsers as $key => $user) {
				foreach ($user[0] as $id => $visitCount) {
					if (!isset($visitCounts[$id])) {
						$visitCounts[$id] = 0;
					}

					$visitCounts[$id] += $visitCount;
				}
			}

			// Sort the final array by the counts
			arsort($visitCounts);

			// Recommend posts from the final list
			$recommendedPosts = array();
			$i = 0;
			foreach($visitCounts as $id => $visitCount) {
				// Check that the post isn't in the Ignore list and that we currently aren't on the post
				// If we are in test mode, we may recommend the current post

				// Choose a post randomness% of the time, we want to choose randomly first
				$r = mt_rand(0, 100);
				if ($randomness > 0 && $r >= (100 - $randomness) && $id != "" && isset($recommendablePosts[$id]) && !isset($recommendedPosts[$id]) && $i < $numPostsToRecommend) {
					array_push($this->posts, new kp_recommendedPost($id, true));
					$recommendedPosts[$id] = $id;
					$i = $i + 1;
				}
			}

			// Recommend posts until they fill the list
			foreach($visitCounts as $id => $visitCount) {
				// Check that the post isn't in the Ignore list and that we currently aren't on the post
				// If we are in test mode, we may recommend the current post
				if ($i < $numPostsToRecommend && $id != "" && isset($recommendablePosts[$id]) && !isset($recommendedPosts[$id])) {
					array_push($this->posts, new kp_recommendedPost($id, false));
					$recommendedPosts[$id] = $id;
					$i = $i + 1;
				}
			}

		}

		// If we don't have any recommendation, randomly generate a list of posts
		if (count($this->posts) == 0) {
			if (count($recommendablePosts) == 0) {
				$recommendablePosts = $allPosts;
			}

			$recommendedPosts = array();
			$i = 0;
			while ($i < $numPostsToRecommend && count($recommendablePosts) > 0) {
				$r = mt_rand(0, count($recommendablePosts)-1);
				$tempId = null;
				$j = 0;
				foreach ($recommendablePosts as $id => $temp) {
					if ($j >= $r) {
						$tempId = $id;

						break;
					}

					$j = $j + 1;
				}

				if ($tempId != null && isset($recommendablePosts[$tempId]) && !isset($recommendedPosts[$tempId])) {
					array_push($this->posts, new kp_recommendedPost($tempId, true));
					unset($recommendablePosts[$tempId]);
				}

				$i = $i + 1;
			}
		}

		// Shuffle the recommendations
		shuffle($this->posts);

		return null;
	}

	/**
	 * Save a visit to the post the user is currently at using the user's ip address and the post viewed
	 *
	 * @param string $postID: The ID of the post that we are saving a visit for
	 * @param bool $testData: Indicates if we are saving test data
	 * @return null
	 */
	public function saveVisit($postID = null, $testData = false) {
		global $visitTbl, $kp_firstPost, $wpdb;

		if ($postID == null) {
			return;
		}

		// Check if user is a bot or an ignored ip address
		if (!kp_isUserVisitValid($this->ipAddress, $this->userAgent)) {
			return;
		}

		$row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $visitTbl WHERE IP=%s AND UserAgent=%s", $this->ipAddress, $this->userAgent), OBJECT, 0);

		// Get the row_id for this particular user
		if (isset($row->VisitID)) {
			// unserialize the row data
			$Visits = unserialize($row->Visits);

			// Add the new visit
			if (isset($Visits[$postID])) {
				$Visits[$postID] += 1;
			} else {
				$Visits[$postID] = 1;
			}

			// Update the row
			$wpdb->query($wpdb->prepare("UPDATE $visitTbl SET Visits=%s, UpdateDate=NOW(), DataSent='0', TestData=%d WHERE IP=%s AND UserAgent=%s", serialize($Visits), $testData, $this->ipAddress, $this->userAgent));
		} else {
			$Visits = array();
			$Visits[$postID] = 1;

			$wpdb->insert($visitTbl, array("Visits" => serialize($Visits), "IP" => $this->ipAddress, "UserAgent" => $this->userAgent));
		}

		return null;
	}
} // End kp_recommender class
?>
