<?php
session_set_cookie_params(0);
session_start();

if(isset($_SESSION['ismember'])){
if($_SESSION['ismember']==1){
    $_SESSION['filterset']=0;
    $_SESSION['nofilterset']=0;
    if(isset($_POST['SB'])){

$_SESSION['source']='search';
        if(!empty($_POST['search'])) {
            if (empty($_POST['caryear']) && empty($_POST['carcolor']) && empty($_POST['cartrans']) && empty($_POST['carfuel']) && empty($_POST['cartype'])) {
                $_SESSION['nofilterset'] =1;

                $_SESSION['search'] = "'" . $_POST['search'] . "'";
                header('Location:LISTCAR.php');


            } elseif ( !empty($_POST['caryear']) || !empty($_POST['carcolor']) && !empty($_POST['cartrans']) || !empty($_POST['carfuel']) || !empty($_POST['cartype'])  ){
                $_SESSION['search'] = "'" . $_POST['search'] . "'";
                if(!empty($_POST['caryear'])){
                    $_SESSION['caryear']="'".$_POST['caryear']."'";
                }else{
                    $_SESSION['caryear']="year";

                }

                if(!empty($_POST['carcolor'])){
                    $_SESSION['carcolor']="'".$_POST['carcolor']."'";
                }else{
                    $_SESSION['carcolor']="color";

                }
                $_SESSION['cartype']="'".$_POST['cartype']."'";
                $_SESSION['cartrans']="'".$_POST['cartrans']."'";
                $_SESSION['carfuel']="'".$_POST['carfuel']."'";
                $_SESSION['filterset']=1;

                header('Location:LISTCAR.php');






            }




        }















    }elseif(isset($_POST['CB'])){
        $_SESSION['source']='make';
        $_SESSION['makelist']=$_POST['carinfo1'];
       header('Location:LISTCAR.php');
    }
    elseif(isset($_POST['CB1'])){
        $_SESSION['source']='type';
        $_SESSION['typelist']=$_POST['carinfo2'];
        header('Location:LISTCAR.php');
    }














    $db = new mysqli('localhost', 'root', '', 'sayarti');
    $qq="SELECT * FROM car where approval=1 ORDER BY ID DESC;";
    $resq=$db->query($qq);
    $crow1=$resq->fetch_assoc();
    $crow2=$resq->fetch_assoc();
    $crow3=$resq->fetch_assoc();
    $crow4=$resq->fetch_assoc();
    $crow5=$resq->fetch_assoc();
    $crow6=$resq->fetch_assoc();
    $crow7=$resq->fetch_assoc();
    $crow8=$resq->fetch_assoc();
    $pos1=$crow1['ID'];
    $pos2=$crow2['ID'];
    $pos3=$crow3['ID'];
    $pos4=$crow4['ID'];
    $pos5=$crow5['ID'];
    $pos6=$crow6['ID'];
    $pos7=$crow7['ID'];
    $pos8=$crow8['ID'];





    $pqry1="select * from images where CarID=".$pos1." and img_num=1";
$pres1=$db->query($pqry1);
$prow1=$pres1->fetch_assoc();
    if($prow1!=null) {
        $url1 = "uploads/" . $prow1['img_url'];
    }else{
        $url1 = "web porject/null.png";
    }

    $pqry2="select * from images where CarID=".$pos2." and img_num=1";
    $pres2=$db->query($pqry2);
    $prow2=$pres2->fetch_assoc();
    if($prow2!=null) {
        $url2 = "uploads/" . $prow2['img_url'];
    }else{
        $url2 = "web porject/null.png";
    }

    $pqry3="select * from images where CarID=".$pos3." and img_num=1";
    $pres3=$db->query($pqry3);
    $prow3=$pres3->fetch_assoc();
    if($prow3!=null) {
        $url3 = "uploads/" . $prow3['img_url'];
    }else{
        $url3 = "web porject/null.png";
    }

    $pqry4="select * from images where CarID=".$pos4." and img_num=1";
    $pres4=$db->query($pqry4);
    $prow4=$pres4->fetch_assoc();
    if($prow4!=null) {
        $url4 = "uploads/" . $prow4['img_url'];
    }else{
        $url4 = "web porject/null.png";
    }
    $pqry5="select * from images where CarID=".$pos5." and img_num=1";
    $pres5=$db->query($pqry5);
    $prow5=$pres5->fetch_assoc();
    if($prow5!=null) {
        $url5 = "uploads/" . $prow5['img_url'];
    }else{
        $url5 = "web porject/null.png";
    }

    $pqry6="select * from images where CarID=".$pos6." and img_num=1";
    $pres6=$db->query($pqry6);
    $prow6=$pres6->fetch_assoc();
    if($prow6!=null) {
        $url6 = "uploads/" . $prow6['img_url'];
    }else{
        $url6 = "web porject/null.png";
    }


    $pqry7="select * from images where CarID=".$pos7." and img_num=1";
    $pres7=$db->query($pqry7);
    $prow7=$pres7->fetch_assoc();
    if($prow7!=null) {
        $url7 = "uploads/" . $prow7['img_url'];
    }else{
        $url7 = "web porject/null.png";
    }


    $pqry8="select * from images where CarID=".$pos8." and img_num=1";
    $pres8=$db->query($pqry8);
    $prow8=$pres8->fetch_assoc();
    if($prow8!=null) {
        $url8 = "uploads/" . $prow8['img_url'];
    }else{
        $url8 = "web porject/null.png";
    }



    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SAyarti</title>
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
                        <button type="submit" style="position: relative; right:100px;" name="SB"><i class="fa fa-search"></i>SEARCH</button>

                        <?php
                        $txt=$_SESSION['username'];

                        echo "<a href='user-page.php' style='font-size: x-large '> <img src='https://img.icons8.com/cotton/24/000000/user-female--v4.png'/>     $txt</a>";
                        ?>

                        </form>
                    </div>
                </th>




                <th style="width: 200px">
                    <div class="menu1" style="font-size:30px;cursor:pointer; margin :10px; color: #468998 ; border-color:#8ec6da; " onclick="openNav()">MENU &#9776;</div>
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








    <section class="cars">
        <div class="container-fluid">


            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="web porject/fastest-cars-world-2021-luxe-digital@2x.jpeg" alt="Los Angeles" style="width:100%;height:600px">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="web porject/2.jpg" alt="Chicago" style="width:100%; height:600px ;">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="web porject/3.jpg" alt="New York" style="width:100%; height:600px ;">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>

            <br>
            <br>
            <br>




            <div class="row" style="background-color:#6a88a6 ">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>الفئات</h2>
                    </div>
                </div>
                <table class="table1-bordered">
                    <tr>
                        <th><form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB1">
                            <div class="type0">
                                <div class="cars_item">

                                        <img src="web porject/اقتصادية.jpg" alt="" class="rounded">
                                        <p> اقتصادية</p>
                                    <input type="hidden" name="carinfo2" value="اقتصادية">
                                </div>

                            </div></button>

                            </form>
                        </th>
                        <th><form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB1">
                            <div class="thumbnail">
                                <div class="type0">
                                    <div class="cars_item">


                                            <img src="web porject/تجارية.jpg" alt="" class="rounded" >
                                            <div class="caption">
                                                <p> تجارية</p>
                                                <input type="hidden" name="carinfo2" value="تجارية">
                                            </div>


                                    </div>
                                </div>
                            </div></button>

                            </form>
                        </th>

                        <th><form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB1">
                            <div class="type0">
                                <div class="cars_item">

                                        <img src="web porject/رياضية.jpg" alt="" class="rounded">

                                        <p> رياضية</p>
                                    <input type="hidden" name="carinfo2" value="رياضية">
                                </div>

                            </div></button>

                            </form>

                        </th>
                    </tr>
                    <tr>
                        <th><form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB1">
                            <div class="type0">
                                <div class="cars_item">

                                        <img src="web porject/عائلية.jpg" alt="" class="rounded ">

                                        <p class="p1"> عائلية</p>
                                    <input type="hidden" name="carinfo2" value="عائلية">
                                </div>

                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB1">
                            <div class="type0">
                                <div class="cars_item">

                                        <img src="web porject/فخمة.jpg" alt="" class="rounded">
                                        <p> فخمة</p>
                                    <input type="hidden" name="carinfo2" value="فخمة">
                                </div>
                            </div></button>

                            </form>
                        </th>

                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB1">
                            <div class="type0">
                                <div class="cars_item">

                                        <img src="web porject/كهربائية.jpg" alt="" class="rounded">
                                        <p> كهربائية</p>
<input type="hidden" name="carinfo2" value="كهربائية">

                                </div>
                            </div></button>

                            </form>
                        </th>


            </div>

        </div>

        </th>
        </tr>
        </table>


        </div>

        </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <section>
            <div class="car-type">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>شركات</h2>
                        <br>
                        <br>
                        <br>

                    </div>
                </div>
                <table class="table3" style="background-color: #6a88a6">
                    <tr>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/BMW.png" alt="" class="img-fluid2">
                                    <p>BMW </p>
                                <input type="hidden" name="carinfo1" value="BMW">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden;" name="CB">
                            <div class="type1">

                                    <img src="web porject/Mercedes-Benz.png" alt="" class="img-fluid2">
                                    <p> Mercedes-Benz</p>
                                <input type="hidden" name="carinfo1" value="Mercedes-Benz">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/GMC.png" alt="" class="img-fluid2">
                                    <p>GMC</p>
                                <input type="hidden" name="carinfo1" value="GMC">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Jeep.png" alt="" class="img-fluid2">
                                    <p>  Jeep </p>
                                <input type="hidden" name="carinfo1" value="Jeep">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Nissan.png" alt="" class="img-fluid2">
                                    <p>  Nissan </p>
                                <input type="hidden" name="carinfo1" value="Nissan">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Hyundai.png" alt="" class="img-fluid2">
                                    <p>  Hyundai </p>
                                <input type="hidden" name="carinfo1" value="Hyundai">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Audi.png" alt="" class="img-fluid2">
                                    <p>Audi</p>
                                <input type="hidden" name="carinfo1" value="Audi">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Kia.png" alt="" class="img-fluid2">
                                    <p>  Kia </p>
                                <input type="hidden" name="carinfo1" value="Kia">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/MINI.png" alt="" class="img-fluid2">
                                    <p> MINI  </p>
                                <input type="hidden" name="carinfo1" value="MINI">
                            </div></button>

                            </form>
                        </th>
                    </tr>
                    <tr>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Opel.png" alt="" class="img-fluid2">
                                    <p>Opel </p>
                                <input type="hidden" name="carinfo1" value="Opel">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Toyota.png" alt="" class="img-fluid2">
                                    <p> Toyota</p>
                                <input type="hidden" name="carinfo1" value="Toyota">
                            </div></button>

                            </form>
                        </th>
                        <th> <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Volkswagen.png" alt="" class="img-fluid2">
                                    <p> Volkswagen  </p>
                                <input type="hidden" name="carinfo1" value="Volkswagen">
                            </div></button>

                            </form>
                        </th>
                        <th>
                            <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Lexus.png" alt="" class="img-fluid2">
                                    <p> Lexus  </p>
                                <input type="hidden" name="carinfo1" value="Lexus">
                            </div></button>

                            </form>
                        </th>
                        <th>
                            <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Peugeot.png" alt="" class="img-fluid2">
                                    <p>  Peugeot </p>
<input type="hidden" name="carinfo1" value="Peugeot">
                            </div></button>

                            </form>
                        </th>




                        <th>
                            <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">
                                <input type="hidden" value="Porsche" name="carinfo1">
                                    <img src="web porject/Porsche.png" alt="" class="img-fluid2">
                                    <p>  Porsche </p>
                            </div></button>

                            </form>
                        </th>




                        <th>
<form method="post" action="">
    <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">
                                <input type="hidden" value="seat" name="carinfo1">
                                    <img src="web porject/Seat.png" alt="" class="img-fluid2">
                                    <p>Seat</p>

                            </div></button>

</form>
                        </th>




                        <th>
                            <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden" name="CB">
                            <div class="type1">

                                    <img src="web porject/Lotus.png" alt="" class="img-fluid2">
                                    <p>  Lotus </p>
                                <input type="hidden" name="carinfo1" value="Lotus">
                            </div></button>

                            </form>
                        </th>
                        <th>
                            <form method="post" action="">
                                <button style="background-color: #6a88a6; border: 1px white hidden"name="CB">
                            <div class="type1">

                                    <img src="web porject/Ford.png" alt="" class="img-fluid2">
                                    <p> Ford  </p>
                                <input type="hidden" name="carinfo1" value="Ford">
                            </div></button>

                            </form>
                        </th>
                    </tr>
                </table>
            </div>
        </section>
    </section>
    <section class="new-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>عناصر اضيفت حديثا</h2>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            <table class="table2">
                <tr>
                    <th>
                        <div class="card" style="width:300px; object-fit: cover">
                            <img class="card-img-top" src="<?php echo $url1; ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow1['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow1['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos1;   ?>" style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url2 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow2['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow2['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos2;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url3 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow3['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow3['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos3;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url4 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">J<?php echo $crow4['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow4['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos4;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div>
                        </div>
                </tr>
                <tr>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url5 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow5['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow5['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos5;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div> </div>

                    </th>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url6 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow6['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow6['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos6;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div>
                        </div>
                    </th>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url7 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow7['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow7['price']."$" ?></p>
                                <form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos7;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div> </div>

                    </th>
                    <th>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="<?php echo $url8 ?>" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $crow8['carName']; ?></h4>
                                <p class="card-text"><?php echo $crow8['price']."$" ?></p>
<form method="post" action="CarReview.php">
                                <button name="carinfo" value="<?php echo $pos8;   ?>"style="border: hidden; background-color:dodgerblue; width: 150px; border-radius: 10px">VIEW DETAILS</button>
                                </form>
                            </div> </div>

                </tr>
            </table>



        </div>
        </div>
    </section>














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
