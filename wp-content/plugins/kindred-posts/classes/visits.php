<?php
/**
 *
 * Start kp_visits class
 *
 **/
class kp_visits {
	/**
	 * Get the visits for the specified user
	 *
	 * @param string $ip: The ip address of the user
	 * @param string $ua: The user agent of the user
	 * @param string $testModeValue: Indicates if we should get test mode data ("0" or "1")
	 * @param int $maxPastUpdateDate: The max date in the past to get visit data
	 *
	 * @return mixed
	 *
	 * @since 1.3.4
	 */
	public static function getSingleUserVisits($ip, $ua, $testModeValue = "", $maxPastUpdateDate = -1)
	{
		return self::getVisits(array($ip), array($ua), $testModeValue, $maxPastUpdateDate);
	}

	/**
	 * Get the visits for the specified user
	 *
	 * @param string $ip: The ip address of the user
	 * @param string $ua: The user agent of the user
	 * @param string $testModeValue: Indicates if we should get test mode data ("0" or "1")
	 * @param int $maxPastUpdateDate: The max date in the past to get visit data
	 * @param array $ignoreIPs: An array of IP addresses to ignore
	 * @param array $ignoreUAs: An array of User Agents to ignore
	 * @param string $limit: The limit on the number of users to return
	 *
	 * @return mixed
	 *
	 * @since 1.3.4
	 */
	public static function getVisits($IPs = array(), $UAs = array(), $testModeValue = "", $maxPastUpdateDate = -1, $ignoreIPs = array(), $ignoreUAs = array(), $limit = "5000")
	{
		global $visitTbl, $wpdb;

		$sql = "SELECT * FROM $visitTbl";
		$args = array();
		$where = "";
		
		$inStmt = "";
		foreach ($IPs as $IP) {
			if ($inStmt != "") {
				$inStmt = $inStmt . ",";
			}
			$inStmt = $inStmt . "%s";
			array_push($args, (string)$IP);
		}
		
		if ($inStmt != "") {
			if ($where != "") {
				$where = $where . " AND ";
			}			
			$where = $where . " IP IN (" . $inStmt . ")";
		}

		$inStmt = "";
		foreach ($UAs as $UA) {
			if ($inStmt != "") {
				$inStmt = $inStmt . ",";
			}
			$inStmt = $inStmt . "%s";
			array_push($args, (string)$UA);
		}
		
		if ($inStmt != "") {
			if ($where != "") {
				$where = $where . " AND ";
			}			
			$where = $where . " UserAgent IN (" . $inStmt . ")";
		}
		
		if ($testModeValue != "") {
			if ($where != "") {
				$where = $where . " AND ";
			}			
			$where = $where . " TestData = %s";
			array_push($args, (string)$testModeValue);
		}

		if ($maxPastUpdateDate > 0) {
			// The visitor could have been created many days ago so we also check the updatedate
			if ($where != "") {
				$where = $where . " AND ";
			}
			$where = $where . " (UpdateDate > ADDDATE(NOW(), INTERVAL %d DAY) OR CreateDate > ADDDATE(NOW(), INTERVAL %d DAY))";
			array_push($args, -1*$maxPastUpdateDate);
			array_push($args, -1*$maxPastUpdateDate);
		}
		
		foreach ($ignoreIPs as $ignoreIP) {
			if ($where != "") {
				$where = $where . " AND ";
			}			
			$where = $where . " IP != %s";
			array_push($args, (string)$ignoreIP);
		}
		
		foreach ($ignoreUAs as $ignoreUA) {
			if ($where != "") {
				$where = $where . " AND ";
			}			
			$where = $where . " UserAgent != %s";
			array_push($args, (string)$ignoreUA);
		}
		
		if ($where != "") {
			$sql = $sql . " WHERE" . $where;
		}
		$sql = $sql . " ORDER BY UpdateDate, CreateDate DESC LIMIT $limit;";
		
		$rows = $wpdb->get_results($wpdb->prepare($sql, $args), OBJECT);
		$userVisits = array();
		foreach ($rows as $row) {
			$userVisits[] = unserialize($row->Visits);
		}
		
		return $userVisits;
	}
} // End kp_visits class
