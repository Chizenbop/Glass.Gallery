 <?php $sitepath = "http://people.oregonstate.edu/~hamc/glassgallery/"; ?>
 <?php include $sitepath."header.htm"; ?> 

<form action="upload.php" method="post" enctype="multipart/form-data"class="center">
<input type="file" name="image" /><input type="submit" value="Upload" name="action" />
</form>
 <?php include $sitepath."footer.htm"; ?>