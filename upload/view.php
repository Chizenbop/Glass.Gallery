 <?php $sitepath= "http://people.oregonstate.edu/~hamc/glassgallery/"?>
 <?php include $sitepath."header.htm"; ?> 
 <?php

   $files = glob("uploads/*.*");
	echo '<div class="center">';
   for ($i=count($files)-1; $i>=1; $i--)

  {

  $image = $files[$i];
	$path_parts = pathinfo($image);
  $imagename = basename($image);
  if($path_parts['extension'] == "jpg"){
	$imagename = basename($image,".jpg");
  } elseif($path_parts['extension'] == "png") {
	$imagename = basename($image,".png");
  } elseif($path_parts['extension'] == "jpeg"){
  $imagename = basename($image,".jpeg");
  } elseif($path_parts['extension'] == "gif"){
  $imagename = basename($image,".gif");
  }

  print $imagename . "<br/>";
  echo '<img src="'.$image .'" alt="Random image" class="upload"  />'."<br /><br />";
   }
echo'</div>';
 ?>
 <?php include $sitepath."footer.htm"; ?> 