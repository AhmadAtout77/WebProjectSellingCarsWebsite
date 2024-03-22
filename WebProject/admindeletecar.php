<?php
$db = new mysqli('localhost', 'root', '', 'sayarti');
$q1="DELETE FROM car WHERE ID=".$_POST['del'];
$db->query($q1);
$db->commit();
header("Location:sayarti.php");
?>