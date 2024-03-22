<?php
session_start();
if(isset($_SESSION['ismember'])){
if($_SESSION['ismember']==1){
$_SESSION['fuser']=0;
$db = new mysqli('localhost', 'root', '', 'sayarti');
if(isset($_POST['Search1'])){
    $_SESSION['fuser']=1;
}


if($_SESSION['fuser']==0) {
    $qr2 = "select * from user where UserLevel=0";
}else{
    $qr2 = "select * from user where username="."'".$_POST['getuser']."'";

}
$res2 = $db->query($qr2);
$ss = mysqli_num_rows($res2);
$_SESSION['source']='sh';


$qr1 = "select * from car where approval=0";
$res=$db->query($qr1);
$s = mysqli_num_rows($res);


//if (isset($_POST['Search1'])) {
//    if (!empty($_POST['sh'])) {
//        $qr1 = "select * from car where carName=" . $_SESSION['sh'];
//    }
//}
//else {
//    $qr1 = "select * from car ";
//}
//$res = $db->query($qr1);
//$s = mysqli_num_rows($res);




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="sayarti.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>



<header class="header">


    <table class="header1-table">
        <tr>
            <th style="width:150px;">
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


<center>


    <div class="container m-t-lg">

        <h1 class="card-title"> Admin Page </h1>

        <p><small class="label label-info">HTML/CSS</small></p>

    </div>
    </div>


    </form>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <form class="form-inline" action="admin.php" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="getuser">
            <button class="btn btn-success" type="submit" name="Search1">Search</button>
        </form>
        <form method="post" action="back.php">
            <?php
            if($_SESSION['fuser']==1)
            echo"<button class='btn btn-success' type='submit' name='back' style='margin-left: 10px;'>Back</button>"
            ?>
        </form>

<span style="color: white; position: relative; left: 420px; font-size: 30px;"> USERS </span>
    </nav>

    <div class="table" style="margin-top: 20px">
        <table class="thead-dark" >

            <?php
             echo " <tr>
               
                <th > User Name </th >
                <th > Email</th >
                <th > Number </th >
                <th colspan = '2' > </th >
               ";
            $row2='';
            for($i=0;$i<$ss;$i++) {
                $row2 = $res2->fetch_assoc();
                $un = $row2['username'];
                $e = $row2['email'];
                $ph = $row2['contactnum'];


           echo " 
            </tr >
            <form  action='delete_user.php' method='post'>

            <tr >
                <td  > <input  type ='hidden' name='name' value='$un'>$un</td >
                <td > $e </td >
                <td > $ph</td >
                <td class='button-edit' >
                    <a class='style-button-delete' href = '#'>
                     <button name='delete'type='submit' >  Delete </button>
                    </a >
                </td > 
                
                </form> </tr> " ;

           }
           ?>
        </table >


    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <span style="color: white; position: relative; left: 680px; font-size: 30px;">REQUESTS</span>
    </nav>
    <?php
    if($s!=0){
        ?>
        <div style="border: solid #2196F3 2px; margin-left: 300px; margin-right: 300px;margin-top: 30px; ">


            <table>

                <?php
                $row='';
                for($i=0;$i<$s;$i++){
                    $row=$res->fetch_assoc();
                    $n=$row['carName'];
                    $y=$row['Year'];
                    $p=$row['price'];
                    $IDc=$row['ID'];




                    echo "<tr >";

                    echo "<td style='border-bottom: 3px solid dodgerblue; width: 1000px; background-color: white ' >

<div style='height: 300px; width: 40%; margin-left: 50px; margin-bottom: 20px; margin-top: 50px; display: inline-block;'>


<form method='post' action='CarReview.php'>

<button value='$IDc' name='carinfo' style='width: 150px; margin: 15px; background-color: dodgerblue; border: 1px dodgerblue hidden; border-radius: 15px;'> VIEW DETAILS</button>

</form>

<form method='post' action='approvecar.php'>

<button value='$IDc' name='app' style='width: 150px;margin: 15px; background-color: dodgerblue; border: 1px dodgerblue hidden; border-radius: 15px;'> APPROVE</button>

</form>
<form method='post' action='deletecar.php'>

<button value='$IDc' name='del' style='width: 150px;margin: 15px; background-color: dodgerblue; border: 1px dodgerblue hidden; border-radius: 15px;'>DELETE</button>

</form>

</div>
<div style='display: inline-block;margin-left: 40px; position: relative; top:30px; width: 440px; text-align: center; height: 270px;'>

<span style='font-size: 50px;'>$n   $y</span>
<br>
<br>

<span style='font-size: 30px; color: #0d6efd'> $p$</span>






</div>

    </td> </div>";

                    echo "</tr>";
                }
                ?>





                <?php
                echo "</table>"
                ?>




        </div>

        <?php
    }
    else{
        echo "NO RESULTS FOUND";
    }
    ?>
    </center>

    <!--</center>-->
<!--</section>-->
<!--<section class="new-product">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 text-center">-->
<!--                <div class="section-title">-->
<!---->
<!--                    <h2>عناصر اضيفت حديثا</h2>-->
<!--                    <br>-->
<!--                    <br>-->
<!--                    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">-->
<!--                        <form class="form-inline" action="admin.php" method="post">-->
<!--                            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="sh">-->
<!--                            <button class="btn btn-success" type="submit" name="Search1">Search</button>-->
<!--                        </form>-->
<!--                    </nav>-->
<!--                    <br>-->
<!--                    <br>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <table>-->
<!---->
<!--            --><?php
//            $row='';
//            for($i=0;$i<$s;$i++){
//                $row=$res->fetch_assoc();
//                $n=$row['carName'];
//                $y=$row['Year'];
//                $p=$row['price'];
//                $IDc=$row['ID'];
//                $imgq="SELECT * from images where CarID="."'".$IDc."' and img_num=1";
//                $qres=$db->query($imgq);
//                $qrow=$qres->fetch_assoc();
//                if($qrow!=null) {
//                    $url = "uploads/" . $qrow['img_url'];
//                }
//                else{
//                    $url = "web porject/null.png";
//                }
//
//
//
//                echo "<tr >";
//
//                echo "<td style='border-bottom: 3px solid dodgerblue; width: 1000px; background-color: white ' >
//
//                <div style='height: 300px; width: 40%; margin-left: 20px; margin-bottom: 20px; margin-top: 20px; display: inline-block;'>
//                    <img style='object-fit: contain; width: 100%; height: 100%' src='$url'>
//
//                </div>
//                <div style='display: inline-block;margin-left: 40px; position: relative; top:30px; width: 440px; text-align: center; height: 270px;'>
//
//                    <span style='font-size: 50px;'>$n   $y</span>
//                    <br>
//                    <br>
//
//                    <span style='font-size: 30px; color: #0d6efd'> $p$</span>
//                    <form method='post' action='CarReview.php'>
//
//                        <input type='hidden' value='$IDc' name='accept'>
//                        <button style='width: 150px; background-color: dodgerblue; border: 1px dodgerblue hidden; border-radius: 15px;'> Accept</button>
//                        <button style='width: 150px; background-color: dodgerblue; border: 1px dodgerblue hidden; border-radius: 15px;'> Delete</button>
//
//                    </form>
//
//                </div>
//
//            </td> </div>";
//
//                echo "</tr>";
//            }
//            ?>
<!--        </table>-->





        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
    <?php


}else{

    header('Location:lgin.php');
}






}else{

    header('Location:lgin.php');

}

?>
