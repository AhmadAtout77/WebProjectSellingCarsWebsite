<?php

session_start();
$status = "";
try {

    if (!empty($_POST['txtusername']) && !empty($_POST['txtpass'])) {

        $un = $_POST['txtusername'];
        $ps = $_POST['txtpass'];
        $db = new mysqli('localhost', 'root', '', 'sayarti');
        $qry = "select * from user where username=" . "'" . $un . "'" . " and passw=" . "'" . sha1($ps) . "'";
        $res = $db->query($qry);
        $db->close();
        $row = $res->fetch_assoc();
        if (empty($row)) {
            $status = "INVALID LOGIN";
        } else {
            $_SESSION['UserLevel'] = $row['UserLevel'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['contactnum'] = $row['contactnum'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['profilepic'] = $row['profilepic'];
            $_SESSION['ismember'] = 1;
            $_SESSION['USER_ID'] = $row['USER_ID'];
            $_SESSION['fuser'] = 0;

            if ($_SESSION['UserLevel'] == 1) {
                header('Location:sayarti.php');
            } else {
                header('Location:sayarti.php');
            }
        }
    }


    if (!empty($_POST['txtusername1']) && !empty($_POST['txtpass1']) && !empty($_POST['txtcontactnum']) && !empty($_POST['txtemail'])) {

        $un1 = $_POST['txtusername1'];
        $ps1 = $_POST['txtpass1'];
        $cn = $_POST['txtcontactnum'];
        $em = $_POST['txtemail'];
        $db = new mysqli('localhost', 'root', '', 'sayarti');
        $qry1 = "SELECT * FROM user WHERE username=" . "'" . $_POST['txtusername1'] . "'";
        $qry2 = "SELECT * FROM user WHERE email=" . "'" . $_POST['txtemail'] . "'";
        $res1 = $db->query($qry1);
        $res2 = $db->query($qry2);
        $row1 = $res1->fetch_assoc();
        $row2 = $res2->fetch_assoc();
        if (empty($row1) && empty($row2)) {
            $qry = "INSERT INTO user (username,passw,email, contactnum,UserLevel) VALUES (" . "'" . $_POST['txtusername1'] . "'" . "," . "'" . sha1($_POST['txtpass1']) . "'" . "," . "'" . $_POST['txtemail'] . "'" . "," . "'" . $_POST['txtcontactnum'] . "',0)";
            $db->query($qry);
            $db->commit();
            $db->close();

            $status = "Registration has been done successfuly";
        } else {
            if (!empty($row1)) {
                $status = "THIS USERNAME IS ALREADY TAKEN";
            } elseif (!empty($row2)) {
                $status = "THIS EMAIL IS ALREADY TAKEN";
            }
            $db->close();

        }

    }
} catch (Exception $e) {

}
echo $status;


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SAyarti</title>
    <link rel="stylesheet" type="text/css" href="lgin.css">

    <link rel="stylesheet" type="text/css" href="sayarti.css">
    <link rel="stylesheet" type="text/css" href="CarReview.css">


</head>
<body>

<header class="header">


    <div class="header_logo">
        <a href="lgin.php"> <span>SA</span>yarti </a>

    </div>

</header>

<header style="width: 100%; height: 700px; ">



<form action="" method="post">
    <th style="width: 50%; align-items: center; border-radius: 15px">
        <div style=" margin: 100px; height: 500px; background-color: white; border-radius: 15px; box-shadow:#a7b4b6 1px 2px 2px 4px ;">


            <table style="width: 100%; height: 100%; ">
                <tr>
                    <td style=" height: 70px; border-radius: 15px;">

                        <center style="font-size: 40px; color: #23526c">SIGN UP</center>

                    </td>
                </tr>
                <tr>
                    <td >
                        <center style="margin-right: 220px">

                        <label for="txtusername1" style="margin-left: 127px;"> USERNAME:</label>
                    <input type="text" name="txtusername1" id="txtusername1" style="border-radius: 20px; border: 1px solid dodgerblue; height: 40px">
                        </center>



                    </td>
                </tr>
                <tr>
                    <td >
                        <center style="margin-right: 220px">
                        <label for="txtpass1" style="margin-left: 137px;"> Password:</label>
                        <input type="password" name="txtpass1" id="txtpass1" style="border-radius: 20px; border: 1px solid dodgerblue; height: 40px">
                        </center>

                    </td>
                </tr>
                <tr>
                    <td >
                        <center style="margin-right: 220px">
                        <label for="txtcontactnum" style="margin-left: 75px;" > CONTACT NUMBER:</label>
                        <input type="text" name="txtcontactnum" id="txtcontactnum" style="border-radius: 20px; border: 1px solid dodgerblue; height: 40px" >
                        </center>


                    </td>
                </tr>
                <tr>
                    <td>
                        <center style="margin-right: 220px">
                        <label for="txtemail" style="margin-left: 160px;"> EMAIL:</label>
                        <input type="text" name="txtemail" id="txtemail" style=" border-radius: 20px; border: 1px solid dodgerblue; height: 40px">
                        </center>



                    </td>
                </tr>
                <tr>
                    <td>
                        <center >
                            <a href="lgin.php"> Log in from here </a>

                            <input type="submit" style="width: 200px;background-color:dodgerblue; border-radius: 15px;border: 1px solid dodgerblue; margin-left: 20px; margin-bottom: 10px">
                        </center>
                    </td>
                </tr>

            </table>

</header>


</body>
</html>