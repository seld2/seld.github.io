<html>
<head>
</head>
<body>
<?php
// Load configuration, functions, and classes for the plugin
include_once("../../../../wp-load.php");
include_once("../kindred-posts-index.php");

// Check that the user is an admin
if (!kp_isUserAdmin()) {
	die("You do not have access to this page, please log in as admin</body></html>");
}

// Load the test classes
include_once("classes/recommendedpost.php");
include_once("classes/recommender.php");
include_once("classes/renderer.php");
include_once("classes/test.php");
include_once("classes/testData.php");
include_once("classes/testUser.php");
include_once("classes/widget.php");
include_once("classes/plugin.php");
include_once("classes/visits.php");

$testPostID = 1; // A sample post to use for testing
$numTestsToInsert = -1; // Set to <= 0 if you want to insert data

$testRenderer = false || (isset($_GET["testAll"]) && ($_GET["testAll"] == "true"));
$testRecommendedPost = false || (isset($_GET["testAll"]) && ($_GET["testAll"] == "true"));
$testRecommender = false || (isset($_GET["testAll"]) && ($_GET["testAll"] == "true"));
$testWidget = false || (isset($_GET["testAll"]) && ($_GET["testAll"] == "true"));
$testPlugin = false || (isset($_GET["testAll"]) && ($_GET["testAll"] == "true"));
$testVisits = false || (isset($_GET["testAll"]) && ($_GET["testAll"] == "true"));

$testRenderer = $testRenderer || (isset($_GET["testRenderer"]) && ($_GET["testRenderer"] == "true"));
$testRecommendedPost = $testRecommendedPost || (isset($_GET["testRecommendedPost"]) && ($_GET["testRecommendedPost"] == "true"));
$testRecommender = $testRecommender || (isset($_GET["testRecommender"]) && ($_GET["testRecommender"] == "true"));
$testWidget = $testWidget || (isset($_GET["testWidget"]) && ($_GET["testWidget"] == "true"));
$testPlugin = $testPlugin || (isset($_GET["testPlugin"]) && ($_GET["testPlugin"] == "true"));
$testVisits = $testVisits || (isset($_GET["testVisits"]) && ($_GET["testVisits"] == "true"));

if ($numTestsToInsert > 0) {
	echo "<h3>Inserting $numTestsToInsert Test Post(s)...</h3>";
	$testDataObj = new kp_testData();
	$testDataObj->insertTestPosts($numTestsToInsert);
}

if ($testRenderer) {
	// Test the renderer class
	echo "<h3>Testing classes\\renderer</h3>";
	$renderTestObj = new kp_test_renderer();
	$renderTestObj->runTests();
}

if ($testRecommendedPost) {
	// Test the recommendedPost class
	echo "<h3>Testing classes\\recommendedPost</h3>";
	$recommendedPostTestObj = new kp_test_recommendedPost($testPostID);
	$recommendedPostTestObj->runTests();
}

if ($testRecommender) {
	// Test the recommender class
	echo "<h3>Testing classes\\recommender</h3>";
	$recommenderTestObj = new kp_test_recommender();
	$recommenderTestObj->runTests();
}

if ($testWidget) {
	// Test the widget class
	echo "<h3>Testing classes\\widget</h3>";
	$recommenderTestObj = new kp_test_widget();
	$recommenderTestObj->runTests();
}

if ($testPlugin) {
	// Test the plugin
	echo "<h3>Testing Plugin class</h3>";
	$recommenderTestObj = new kp_test_plugin();
	$recommenderTestObj->runTests();
}

if ($testVisits) {
	// Test the visits class
	echo "<h3>Testing Visits class</h3>";
	$visitsTestObj = new kp_test_visits();
	$visitsTestObj->runTests();
}
?>
<h3>Tests that you can run</h3>
<ul>
	<li><a href="tests-loader.php?testAll=true">Run all tests</a></li>
	<li><a href="tests-loader.php?testRecommender=true">Run recommender class tests</a></li>
	<li><a href="tests-loader.php?testRecommendedPost=true">Run recommended post class tests</a></li>
	<li><a href="tests-loader.php?testRenderer=true">Run renderer class tests</a></li>
	<li><a href="tests-loader.php?testVisits=true">Run visits tests</a></li>
	<li><a href="tests-loader.php?testPlugin=true">Run plugin tests</a></li>
	<li><a href="tests-loader.php?testWidget=true">Run widget class tests</a></li>
</ul>

</body>
</html>
