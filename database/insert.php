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
$age =$_POST['age'];
$birthplace = mysql_real_escape_string($_POST['birthplace']);
$style = mysql_real_escape_string($_POST['style']);
//Checks for null fields
if($aname == NULL || $birthplace == NULL || $age == NULL || $style == NULL ){
//Jump to error page
	header('Location: error.php');
} else {
// Retrieve username and password from database according to user's input
$sql = "INSERT INTO `Artists`(`aname`, `birthplace`, `age`, `style`) VALUES ('".$aname."', '".$birthplace."', '".$age."', '".$style."')";
$login = mysql_query($sql) or die('Query failed: ' . mysql_error() . "<br />\n$sql");;

// Jump to login page
header('Location: index.php');
}
?>