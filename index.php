<?php
// Inialize session
session_start();
// Check, if user is already logged in, then jump to secured page
if(isset($_SESSION['username'])) {
header('Location: admin/securedpage.php');
}
?>
<?php $pagetitle = "Home Page"; ?>
<?php include $sitename."header.htm"; ?> 
<?php 
$imagepath = $sitename."images"; 
?> 
<div style="text-align:center;">
<p>
<?php
$dir = 'upload/uploads/';
$images = scandir($dir);
//Incompatible file type in directory handling
//Loop iterates until compatabible file is found
do {
	$i = rand(2, sizeof($images)-1);
	$path_parts = pathinfo($images[$i]);
  } while($path_parts['extension'] == "db" || $path_parts['extension'] == "jpg");
?>
<img src="upload/uploads/<?php echo $images[$i]; ?>" alt="<?php echo str_replace(array(‘.jpg’, ‘.png’, ‘.gif’), ”, $images[$i]); ?>" class="upload"/>
</p>
<?php
$path_parts = pathinfo($images[$i]);
$im = $images[$i];
$im = basename($im);
  if($path_parts['extension'] == "jpg"){
	$im = basename($im,".jpg");
  } elseif($path_parts['extension'] == "png") {
	$im = basename($im,".png");
  } elseif($path_parts['extension'] == "jpeg"){
  $im = basename($im,".jpeg");
  } elseif($path_parts['extension'] == "gif"){
  $im = basename($im,".gif");
  }
  print $im . "<br/>";
?>
</div>
 <?php include $sitepath."footer.htm"; ?> 