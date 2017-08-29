<?php
class kp_test_visits {
	public $visitsObj; // The recommender object
	
	public function __construct() { }

	public function runTests() {
		$ip = "";
		$ua = "";
		try {
			$this->visitsObj = new kp_recommender($ip, $ua);
			$test = true;
		} catch (Exception $e) {
			$test = false;
		}
		
		$testObj = new kp_test("Test 1", $test, "visits object constructed", "visits object not constructed");
		$testObj->render();		
		return true;
	}	
} // End kp_test_visits
