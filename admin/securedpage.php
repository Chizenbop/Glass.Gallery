<?php
// Inialize session
session_start();
// Check if username session is not set 
if(!isset($_SESSION['username'])) {
header('Location: index.php');
}
?>
<?php
$pagetitle = "Secured page!";
include "../header.htm";
?>
<a href="<?php echo $sitepath; ?>admin/logout.php">Log Out</a>

<?php include "../footer.htm"; ?>