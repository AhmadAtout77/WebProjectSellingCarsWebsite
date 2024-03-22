<?php
$db = new mysqli('localhost', 'root', '', 'sayarti');
$q1="UPDATE car
SET approval =1 where ID=".$_POST['app'];

$db->query($q1);
$db->commit();
header("Location:admin.php");
?>
