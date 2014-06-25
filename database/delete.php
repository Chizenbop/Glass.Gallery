<?php
// Inialize session
session_start();

// Include database connection settings

$dbcnx = @mysql_connect("mysql.cs.orst.edu", "cs275_hamc", 1846);
if (!$dbcnx) {
	echo 'connect fail';
	exit();
}

$db = mysql_select_db("cs275_hamc", $dbcnx);
if (!$db) {
	echo 'select fail';
	exit();
}
?>
<?php
$aname = mysql_real_escape_string($_POST['aname']);

// Retrieve username and password from database according to user's input
$sql = "DELETE FROM Artists WHERE aname='".$aname."'";
$login = mysql_query($sql) or die('Query failed: ' . mysql_error() . "<br />\n$sql");;

// Jump to login page
header('Location: index.php');
?>