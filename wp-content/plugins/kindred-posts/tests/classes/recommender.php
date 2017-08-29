<?php
class kp_test_recommender {
	public $recObj; // The recommender object

	public function __construct() { }

	public function runTests() {
		$isTestMode = get_option("kp_AdminTestMode", "false");
		update_option("kp_AdminTestMode", "true");
		$this->test1();
		$this->test2();
		$this->test3();
		$this->test4();
		$this->test5(); // (1 user)
		$this->test6(); // (4 users, 1 user closely related to 1 other user,  no randomness)
		$this->test6a(); // (4 users, 1 user closely related to 1 other user, total randomness)
		$this->test7(); // (5 users, 1 user closely related to 2 other users, no randomness)
		$this->test7a(); // (5 users, 1 user closely related to 2 other users, total randomness)
		$this->test8(); // Test kp_runRecommender returns the same results as the the recommender, no randomness
		update_option("kp_AdminTestMode", $isTestMode);
	}

	/**
	 * Construct the recommender
	 **/
	public function test1() {
		$ip = "";
		$ua = "";
		try {
			$this->recObj = new kp_recommender($ip, $ua);
			$test = true;
		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 1", $test, "recommender object constructed", "recommender object not constructed");
		$testObj->render();
	}

	/**
	 * Construct the recommender and attempt to render the template
	 **/
	public function test2() {
		$ip = "";
		$ua = "";
		$template = "{kp_recommendedPosts}s";
		try {
			$this->recObj = new kp_recommender($ip, $ua);
			$test = ($this->recObj->render($template) == "s");
		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 2", $test, "recommender object rendered", "recommender object not rendered");
		$testObj->render();
	}

	/**
	 * Test the recommender->saveVisit
	 **/
	public function test3() {
		kp_resetVisitData();

		$ip = "";
		$ua = "";
		$template = "{Posts}";
		try {
			$this->recObj = new kp_recommender($ip, $ua, $template);
			$this->recObj->saveVisit(1);
			$test = true;

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 3", $test, "recommender object visit saved", "recommender object not visit saved");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test the recommender->getDistance
	 **/
	public function test4() {
		kp_resetVisitData();

		$ip = "1";
		$ua = "1";
		$template = "{Posts}";
		try {
			$this->recObj = new kp_recommender($ip, $ua, $template);
			$dist = $this->recObj->getDistance(array(1=>1), array(1=>1));
			$test = ($dist == 100.0);

			if ($test) {
				$dist = $this->recObj->getDistance(array(1=>1, 2=>1), array(1=>1, 2=>1));
				$test = ($dist == 0);
			}

			if ($test) {
				$dist = $this->recObj->getDistance(array(1=>1, 2=>1, 3=>1), array(1=>1, 2=>1));
				$test = ($dist == 1);
			}

			if ($test) {
				$dist = $this->recObj->getDistance(array(1=>2, 2=>1, 3=>1), array(1=>1, 2=>1));
				$test = ($dist == sqrt(2));
			}

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 4", $test, "recommender object distance calculated", "recommender object distance not calculated");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test the recommender->run (with 1 user so no real recommendations)
	 **/
	public function test5() {
		kp_resetVisitData();

		try {
			$numItemsToRecommend = 3;

			// Set up test data in database
			$testData = new kp_testData();
			$testPostIDs = $testData->insertTestPosts(10);
			$tK = array_keys($testPostIDs);

			$user1 = new kp_testUser(array($tK[0], $tK[1], $tK[2]), array());
			$user1->recommender->run($numItemsToRecommend, 1);

			// Determine that there were not real recommendations (all random)
			$test = (count($user1->recommender->posts) == $numItemsToRecommend);
			foreach ($user1->recommender->posts as $post) {
				if ($test) {
					$test = $post->isRandom;
				}
			}

			$user1->deleteVisitData();
			$testData->deleteAllTestPosts();

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 5", $test, "recommender object correctly recommending random items", "recommender object not recommending random items");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test the recommender->run (4 users, 1 user closely related to 1 other user)
	 * User1 related to User2. No randomness.
	 **/
	public function test6() {
		kp_resetVisitData();

		try {
			// Set up test data in database
			$testData = new kp_testData();
			$testPostIDs = $testData->insertTestPosts(10);
			$tK = array_keys($testPostIDs);

			// User Group #1
			$user1 = new kp_testUser(array($tK[0], $tK[1], $tK[2]), array());
			$user2 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[3]), array());

			// User Group #2
			$user3 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());
			$user4 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());

			$user1->recommender->randomness = 0;
			$user1->recommender->run(1, 1);

			$rpPost = $user1->recommender->getRecommendedPost($tK[3]);
			$test = ($rpPost != null);
			$test = ($test && !$rpPost->isRandom);

			$user1->deleteVisitData();
			$user2->deleteVisitData();
			$user3->deleteVisitData();
			$user4->deleteVisitData();
			$testData->deleteAllTestPosts();

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 6", $test, "recommender object recommending items for 1 user closely related to 1 other user. No randomness.", "recommender object recommending items for 1 user closely related to 1 other user. No randomness.");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test the recommender->run (4 users, 1 user closely related to 1 other user)
	 * User1 related to User2. Total randomness.
	 **/
	public function test6a() {
		kp_resetVisitData();

		try {
			// Set up test data in database
			$testData = new kp_testData();
			$testPostIDs = $testData->insertTestPosts(10);
			$tK = array_keys($testPostIDs);

			// User Group #1
			$user1 = new kp_testUser(array($tK[0], $tK[1], $tK[2]), array());
			$user2 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[3]), array());

			// User Group #2
			$user3 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());
			$user4 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());

			$user1->recommender->randomness = 100;
			$user1->recommender->run(1, 1);

			$test = ($user1->recommender->posts[0]->isRandom);

			$user1->deleteVisitData();
			$user2->deleteVisitData();
			$user3->deleteVisitData();
			$user4->deleteVisitData();
			$testData->deleteAllTestPosts();

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 6a", $test, "recommender object recommending items for 1 user closely related to 1 other user. Total randomness.", "recommender object recommending items for 1 user closely related to 1 other user. Total randomness.");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test the recommender->run (5 users, 1 user closely related to 2 other users)
	 * User1 related to User2 and User3. No randomness.
	 **/
	public function test7() {
		kp_resetVisitData();

		try {
			// Set up test data in database
			$testData = new kp_testData();
			$testPostIDs = $testData->insertTestPosts(10);
			$tK = array_keys($testPostIDs);

			// User Group #1
			$user1 = new kp_testUser(array($tK[0], $tK[1]), array());
			$user2 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[3]), array());
			$user3 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[5]), array());

			// User Group #2
			$user4 = new kp_testUser(array($tK[4], $tK[7], $tK[6]), array());
			$user5 = new kp_testUser(array($tK[4], $tK[7], $tK[6]), array());

			$user1->recommender->randomness = 0;
			$user1->recommender->run(2, 2, array(), true);

			$test = true;

			// Check if the post #2 and if #3 or #5 were recommended
			$test = ($test && ($user1->recommender->isPostRecommended($tK[2])));
			$test = ($test && ($user1->recommender->isPostRecommended($tK[3]) || $user1->recommender->isPostRecommended($tK[5])));

			$user1->deleteVisitData();
			$user2->deleteVisitData();
			$user3->deleteVisitData();
			$user4->deleteVisitData();
			$user5->deleteVisitData();
			$testData->deleteAllTestPosts();

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 7", $test, "recommender object recommending 2 items for 1 user closely related to 2 other users. No randomness.", "recommender object recommending 2 items for 1 user closely related to 2 other users. No randomness.");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test the recommender->run (5 users, 1 user closely related to 2 other users)
	 * User1 related to User2 and User3. Total randomness.
	 **/
	public function test7a() {
		kp_resetVisitData();

		try {
			// Set up test data in database
			$testData = new kp_testData();
			$testPostIDs = $testData->insertTestPosts(10);
			$tK = array_keys($testPostIDs);

			// User Group #1
			$user1 = new kp_testUser(array($tK[0], $tK[1]), array());
			$user2 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[3]), array());
			$user3 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[5]), array());

			// User Group #2
			$user4 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());
			$user5 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());

			$user1->recommender->randomness = 100;
			$user1->recommender->run(2, 2, array(), true);

			$test = false || ($user1->recommender->posts[0]->isRandom);
			$test = $test || ($user1->recommender->posts[1]->isRandom);

			$user1->deleteVisitData();
			$user2->deleteVisitData();
			$user3->deleteVisitData();
			$user4->deleteVisitData();
			$user5->deleteVisitData();
			$testData->deleteAllTestPosts();

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 7", $test, "recommender object recommending items for 1 user closely related to 2 other users. Total randomness.", "recommender object recommending items for 1 user closely related to 2 other users. Total randomness.");
		$testObj->render();

		kp_resetVisitData();
	}

	/**
	 * Test kp_runRecommender returns the same results as the the recommender (no randomness)
	 **/
	public function test8() {
		kp_resetVisitData();

		try {
			$randomness = 0;

			// Set up test data in database
			$testData = new kp_testData();
			$testPostIDs = $testData->insertTestPosts(10);
			$tK = array_keys($testPostIDs);

			// User Group #1
			$user1 = new kp_testUser(array($tK[0], $tK[1], $tK[2]), array());
			$user2 = new kp_testUser(array($tK[0], $tK[1], $tK[2], $tK[3]), array());

			// User Group #2
			$user3 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());
			$user4 = new kp_testUser(array($tK[4], $tK[5], $tK[6]), array());

			// Get the recommendation from the recommender
			$user1->recommender->randomness = $randomness;
			$user1->recommender->run(1);

			// Get the recommendation from the lib function
			$posts = kp_getRecommendedWP_Posts(1, $user1->ipAddress, $user1->userAgent, array(), $randomness);

			$test = ($user1->recommender->posts[0]->post->ID == $posts[0]->ID);

			$user1->deleteVisitData();
			$user2->deleteVisitData();
			$user3->deleteVisitData();
			$user4->deleteVisitData();
			$testData->deleteAllTestPosts();

		} catch (Exception $e) {
			$test = false;
		}

		$testObj = new kp_test("Test 8", $test, "results from recommendation function match results from recommendation engine", "results from recommendation function do not match results from recommendation engine");
		$testObj->render();

		kp_resetVisitData();
	}
} // End kp_test_recommender
?>
