<?php
session_start();
?>
<?php
$pagetitle = "Administration";
include "../header.htm";
 $dbcnx = @mysql_connect("mysql.cs.orst.edu", 
"cs275_hamc", 1846);
if(!$dbcnx) {
echo 'connect fail';
exit();
}
$db=mysql_select_db("cs275_hamc",$dbcnx);
if(!$db) {
echo 'select fail';
exit();
}
?>
<form method="POST" action="login.php"style="text-align:center;">
<tr>
<td>Username<input type="text" name="username" size="20">
</td>
</tr>
<tr>
<td>Password<input type="password" name="password" 
size="20">
</td>
</tr>
<input type="submit" value="Login" >
</form>
<?php
include "../footer.htm";
?>