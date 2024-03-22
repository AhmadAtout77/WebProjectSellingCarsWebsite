
<?php
session_set_cookie_params(0);
session_start();



if(isset($_SESSION['ismember'])){
if($_SESSION['ismember']==1) {

     $use= $_SESSION['username'];
     $con=$_SESSION['contactnum'] ;
     $em= $_SESSION['email'];
     $prof= $_SESSION['profilepic'] ;



$db = new mysqli('localhost', 'root', '', 'sayarti');
 $qr1 = "select * from car where USER_ID =".$_SESSION['USER_ID']." ORDER BY ID DESC" ;
$res = $db->query($qr1);
$s = mysqli_num_rows($res);


    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User page / SAyarti</title>
    <link rel="stylesheet" type="text/css" href="user-page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="sayarti.css">
    <link rel="stylesheet" type="text/css" href="CarReview.css">


    <link rel="stylesheet" type="text/css" href="sayarti.css">
    <script src="user-page.js"></script>
</head>

<body>
<header class="header" style=" width: 100%;">


    <table class="header1-table">
        <tr>
            <th  style="width:150px;">
                <div class="header_logo">
                    <a href="sayarti.php"> <span>SA</span>yarti  </a>

                </div >
            </th>

            <th >
                <div class="search-container">

                    <button type="filter" onclick="openNav2()">&#9783; filter</button>
                    <div id="mySidenav2" class="sidenav2">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
                        <div style=" height: 600px">
                            <form method="post" action="">
                                <table class="ftable">


                                    <tr>
                                        <th>
                                            YEAR:
                                        </th>
                                        <th>
                                            <center>  <input id="fYEAR" style="width: 42%" name="caryear">      </center>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            TRANSMISSION:
                                        </th>
                                        <th>

                                            <select id="country" name="cartrans">
                                                <option value=""></option>
                                                <option value="Automatic">automatic</option>
                                                <option value="Gear">Gear</option>

                                            </select>

                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            FUEL:
                                        </th>
                                        <th>

                                            <select id="country" name="carfuel">
                                                <option value=""></option>
                                                <option value="diesel">diesel</option>
                                                <option value="petrol">petrol</option>
                                                <option value="electric">electric</option>
                                            </select>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            TYPE:
                                        </th>
                                        <th>

                                            <select id="country" name="cartype">
                                                <option value=""></option>
                                                <option value="اقتصادية">اقتصادية</option>
                                                <option value="تجارية">تجارية</option>
                                                <option value="رياضية">رياضية</option>
                                                <option value="عائلية">عائلية</option>
                                                <option value="فخمة">فخمة</option>
                                                <option value="كهربائية">كهربائية</option>
                                            </select>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            COLOR:
                                        </th>
                                        <th>
                                            <center>  <input id="fcolor" style="width: 42%" name="carcolor">      </center>
                                        </th>
                                    </tr>

                                </table>





                        </div>
                    </div>
                    <script>
                        function openNav2() {

                            document.getElementById("mySidenav2").style.width = "500px";

                        }

                        function closeNav2() {

                            document.getElementById("mySidenav2").style.width = "0";

                        }
                    </script>



                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit" style="position: relative; right:70px;" name="SB"><i class="fa fa-search"></i>SEARCH</button>

                    <?php
                    $txt=$_SESSION['username'];
                    echo "<a href='user-page.php' style='font-size: x-large '> <img src='https://img.icons8.com/cotton/24/000000/user-female--v4.png'/>     $txt</a>";
                    ?>
                    </form>
                </div>
            </th>




            <th style="width: 200px">
                <div class="menu1" style="font-size:30px;cursor:pointer; margin :10px;" onclick="openNav()">MENU &#9776;</div>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="selling.php">POST A CAR</a>
                    <?php
                    if($_SESSION['UserLevel']==1){
                        echo "<a href='admin.php'>ADMIN PAGE</a>";
                    }
                    ?>

                    <a href="logout.php">LOG OUT</a>


                </div>

                </div>
                <script>
                    function openNav() {

                        document.getElementById("mySidenav").style.width = "250px";

                    }

                    function closeNav() {

                        document.getElementById("mySidenav").style.width = "0";

                    }
                </script>

            </th>

        </tr>


    </table>
</header>
<br>
<br>




<div class="container">
    <div class="profile-header">
        <div class="profile-img">
            <img src="https://img.icons8.com/cotton/256/000000/user-male--v4.png" width="200" alt="Profile Image">
        </div>
        <div class="profile-nav-info">
            <h3 class="user-name"><?php  echo $use ?></h3>
            <div class="address">
                <p id="state" class="state">Palestine,</p>
                <span id="country" class="country">Nablus.</span>
            </div>


        </div>
        <div class="profile-option">
            <div class="notification">
                <i class="fa fa-bell"></i>
                <span class="alert-message">3</span>
            </div>
        </div>
    </div>

    <div class="main-bd">
        <div class="left-side">
            <div class="profile-side">
                <p class="mobile-no"><i class="fa fa-phone"></i><?php  echo $con ?></p>
                <p class="user-mail"><i class="fa fa-envelope"></i> <?php  echo $em ?></p>
                <div class="user-bio">
                    <h3>Bio</h3>
                    <p class="bio">
                        some text to shown

                    </p>
                </div>
                <div class="profile-btn">
                    <button class="chatbtn" id="chatBtn"><i class="fa fa-comment"></i> Call me </button>
                    <button class="createbtn" id="Create-post"><i class="fa fa-plus"></i> Create</button>
                </div>
                <div class="user-rating">
                    <h3 class="rating">4.5</h3>
                    <div class="rate">
                        <div class="star-outer">
                            <div class="star-inner">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <span class="no-of-user-rate"><span>123</span>&nbsp;&nbsp;reviews</span>
                    </div>

                </div>
            </div>

        </div>
        <div class="right-side">

            <div class="nav">
                <ul>
                    <li onclick="tabs(0)" class="user-post ">Posts</li>
                    <li onclick="tabs(1)" class="user-review active">Reviews</li>
                    <li onclick="tabs(2)" class="user-setting"> Settings</li>
                </ul>
            </div>
            <div class="profile-body">
                <div class="profile-posts tab">
                    <h1>Your Post</h1>
                    <p>some text to shown </p>
                </div>
                <div class="profile-reviews tab">
                    <h1>User reviews</h1>
                    <p>some text to shown!</p>
                </div>
                <div class="profile-settings tab">
                    <div class="account-setting">
                        <h1> Account Setting</h1>
                        <p>some text to shown</p>
                    </div>
                </div>

                <table style="margin-left: 40px">

                    <?php
                    $row='';
                    for($i=0;$i<$s;$i++){
                        $row=$res->fetch_assoc();
                        $n=$row['carName'];
                        $y=$row['Year'];
                        $p=$row['price'];
                        $IDc=$row['ID'];
                        $imgq="SELECT * from images where CarID="."'".$IDc."' and img_num=1";
                        $qres=$db->query($imgq);
                        $qrow=$qres->fetch_assoc();
                        if($qrow!=null) {
                            $url = "uploads/" . $qrow['img_url'];
                        }else{
                            $url = "web porject/null.png";
                        }



                        echo "<tr >";

                        echo "<td style='border-bottom: 3px solid dodgerblue; width: 1000px;  background-color: white;  ' >
<table>
<tr>
<th >
<div style='height: 300px; width: 430px; margin-left: 20px; margin-bottom: 20px; margin-top: 20px; display: inline-block;'>
<img style='object-fit: contain; width: 100%; height: 100%' src='$url'>

</div>
</th>
<th >
<div style='display: inline-block;margin-left: 40px; position: relative; top:30px; width: 440px; text-align: center; height: 270px;'>

<span style='font-size: 50px;'>$n   $y</span>
<br>
<br>

<span style='font-size: 30px; color: #0d6efd'> $p$</span>
<br>

<form method='post' action='CarReview.php'>


<button value='$IDc' name='carinfo' style='width: 150px; background-color: dodgerblue; border: 1px dodgerblue hidden; border-radius: 15px;'> VIEW DETAILS</button>
</form>
<form method='post' action='deletecaruser.php'>
<button  name='del' value='$IDc' style='width: 150px; margin-top: 20px; background-color: #b75370; border: 1px #b75370 hidden; border-radius: 15px;'> DELETE </button>
</form>

</form>

</div>
</th>
</tr>
</table>
    </td> </div>";

                        echo "</tr>";
                    }
                    ?>





                    <?php
                    echo "</table>"
                    ?>
            </div>
        </div>

    </div>
    
</div>
</body>
<?php


}else{

    header('Location:lgin.php');
}






}else{

    header('Location:lgin.php');

}

?>
