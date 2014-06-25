
<?php $pagetitle ="Database"; ?> 
<?php include "../header.htm"; ?> 
 
<?php 
 $dbcnx = @mysql_connect("mysql.cs.orst.edu", 
"cs275_hamc", 1846);
if (!$dbcnx){
	echo 'Connection failure!';
	exit();
} 
?>
<?php
$db = mysql_select_db("cs275_hamc", $dbcnx);
if (!$db){
	echo 'Database failure! ';
}
//Choose table within DB

if (!empty($_POST["sort"]) && ($_POST["sort"] == 'ASC' or $_POST["sort"] == 'DESC')) {
       $sort = mysql_real_escape_string($_POST['sort']);	
}else{  
    $sort = "ASC";
}
$query1= "SELECT * FROM Artists ";
$query = "SELECT aname, birthplace, age, style FROM Artists ORDER BY aname " .$sort. "";
$result = mysql_query($query) or die('Query failed: ' . mysql_error() . "<br />\n$query");;
if(!$result){
	die ('Fatal error(s): ' . mysql_error());
}
?>

<table class="gradienttable">
	<caption style="font-size:200%;">Glass Artists</caption>
	<tr>
		<th style="text-decoration:underline;">Name</th>
		<th style="text-decoration:underline;">Birthplace</th>
		<th style="text-decoration:underline;">Age</th>
		<th style="text-decoration:underline;">Style</th>
	</tr>
<?php 
//get the data
while ( $row = mysql_fetch_array($result) ) {
echo "<tr>";
echo "<td>" . $row["aname"] . "</td>";
echo "<td>" . $row["birthplace"] . "</td>";
echo "<td>" . $row["age"] . "</td>";
echo "<td>" . $row["style"] . "</td>";
echo "</tr>";
}
?>
</table>
<h4 class="center">Sort Artists by Name</h4>
<form method= "POST" action = index.php class="center">
<div>
<select name="sort">
<option value="ASC">Ascending</option>
<option value="DESC">Descending</option>
</select>
</div>
<input type="submit" value ="Sort">
</form>
<h4>Add Artist</h4>
<form method="POST" action="insert.php" class="long">
<tr>
<td>Artist Name<input type="text" name="aname" size="30">
</td>
</tr>
<tr>
<td>Birthplace<input type="text" name="birthplace" 
size="20">
</td>
</tr>
<tr>
<td>Age<input type="number" name="age" 
size="3">
</td>
</tr>
<tr>
<td>Style<input type="text" name="style" 
size="140">
</td>
</tr>
<input type="submit" value="Insert" >
</form>
<h4> Update Artist</h4>
<form method="POST" action="update.php" class="long">
<td>Artist Name<input type="text" name="aname" size="30">
</td>
</tr>
<tr>
<td>Birthplace<input type="text" name="birthplace" 
size="20">
</td>
</tr>
<tr>
<td>Age<input type="number" name="age" 
size="3">
</td>
</tr>
<tr>
<td>Style<input type="text" name="style" 
size="140">
</td>
</tr>
<input type="submit" value="Update" >
</form>
<h4>Delete Artist</h4>
<form method="POST" action=delete.php>
<tr>
<td>Artist Name<input type="text" name="aname" size="30">
</td>
</tr>
<input type="submit" value="Delete">
</form>

<?php include "../footer.htm";?>