<?php
$db = new mysqli('localhost', 'root', '', 'sayarti');
    $name=$_POST['name'];
    $sql ="DELETE FROM user WHERE username ='$name'";
    $db->query($sql);
    $db->commit("");

    header("Location:admin.php");


?>