
<?php
session_start();
if(isset($_SESSION['ismember'])){
if($_SESSION['ismember']==1){

$db = new mysqli('localhost', 'root', '', 'sayarti');

$qry ="select USER_ID from user where username="."'".$_SESSION['username']."'";
$rs1=$db->query($qry);
$row=$rs1->fetch_assoc();
$ID=$row['USER_ID'];
if(!$db){
    die('Could not Connect My Sql:' );
}

if(isset($_POST['save'])){
if(!empty($_POST['car_name'])&&!empty($_POST['car_year'])&&!empty($_POST['car_kms'])&&!empty($_POST['car_color'])&& $_POST['car_maker']!='make'&&
    $_POST['car_type']!='Type'&&!empty($_POST['car_fuel'])&&!empty($_POST['car_transmission'])&& !empty($_POST['car_desc'])) {

    $car_name = $_POST['car_name'];
    $car_year = $_POST['car_year'];
    $car_kms = $_POST['car_kms'];
    $car_color = $_POST['car_color'];
    $car_maker = $_POST['car_maker'];
    $car_type = $_POST['car_type'];
    $car_fuel = $_POST['car_fuel'];
    $car_transmission = $_POST['car_transmission'];
    $car_desc = $_POST['car_desc'];
    $car_price = $_POST['car_price'];
    $sql = "INSERT INTO `car` (`carName`, `Make`, `type`, `Transmission`, `Fuel`, `Color`, `KM`, `Year`, `Desc`, `USER_ID`, `approval`, `price`) VALUES ('$car_name', '$car_maker', '$car_type', '$car_transmission', '$car_fuel', '$car_color', '$car_kms', '$car_year', '$car_desc', '$ID','0','$car_price')";



    if (mysqli_query($db, $sql)) {
        echo "New record created successfully !";

$lastcarID=mysqli_insert_id($db);


        $car_pic1=$_FILES['pic1'];
        $fileName=$_FILES['pic1']['name'];
        $fileSize=$_FILES['pic1']['size'];
        $fileTmpname=$_FILES['pic1']['tmp_name'];
        $fileType=$_FILES['pic1']['type'];
        $fileError=$_FILES['pic1']['error'];



        if($fileError === 0){
            if($fileSize > 7000000){
                echo "Your file size is too big";
            }else{
                $imgex=pathinfo($fileName, PATHINFO_EXTENSION);
                $imgex_l=strtolower($imgex);
                $allowedex=array('jpg','jpeg','png');
                if(in_array($imgex_l,$allowedex)){
                    $img_newName=uniqid("IMG-",true).'.'.$imgex_l;
                    $img_up_path='uploads/'.$img_newName;
                    move_uploaded_file($fileTmpname,$img_up_path);
                    $imgqry="INSERT INTO `images` (`img_url`, `CarID`, `img_num`) VALUES ("."'"."$img_newName"."'".","."'".$lastcarID."'".","."'"."1"."'".")";
                    $rrr="uploads/".$img_newName;
                    mysqli_query($db,$imgqry);
                }else{
                    echo "you cannot upload files of this type";
                }
            }

        }else{

        }

        $car_pic1=$_FILES['pic2'];
        $fileName=$_FILES['pic2']['name'];
        $fileSize=$_FILES['pic2']['size'];
        $fileTmpname=$_FILES['pic2']['tmp_name'];
        $fileType=$_FILES['pic2']['type'];
        $fileError=$_FILES['pic2']['error'];



        if($fileError === 0){
            if($fileSize > 7000000){
                echo "Your file size is too big";
            }else{
                $imgex=pathinfo($fileName, PATHINFO_EXTENSION);
                $imgex_l=strtolower($imgex);
                $allowedex=array('jpg','jpeg','png');
                if(in_array($imgex_l,$allowedex)){
                    $img_newName=uniqid("IMG-",true).'.'.$imgex_l;
                    $img_up_path='uploads/'.$img_newName;
                    move_uploaded_file($fileTmpname,$img_up_path);
                    $imgqry="INSERT INTO `images` (`img_url`, `CarID`, `img_num`) VALUES ("."'"."$img_newName"."'".","."'".$lastcarID."'".","."'"."2"."'".")";

                    $rrr="uploads/".$img_newName;
                    mysqli_query($db,$imgqry);

                }else{
                    echo "you cannot upload files of this type";
                }
            }

        }else{

        }

        $car_pic1=$_FILES['pic3'];
        $fileName=$_FILES['pic3']['name'];
        $fileSize=$_FILES['pic3']['size'];
        $fileTmpname=$_FILES['pic3']['tmp_name'];
        $fileType=$_FILES['pic3']['type'];
        $fileError=$_FILES['pic3']['error'];



        if($fileError === 0){
            if($fileSize > 7000000){
                echo "Your file size is too big";
            }else{
                $imgex=pathinfo($fileName, PATHINFO_EXTENSION);
                $imgex_l=strtolower($imgex);
                $allowedex=array('jpg','jpeg','png');
                if(in_array($imgex_l,$allowedex)){
                    $img_newName=uniqid("IMG-",true).'.'.$imgex_l;
                    $img_up_path='uploads/'.$img_newName;
                    move_uploaded_file($fileTmpname,$img_up_path);
                    $imgqry="INSERT INTO `images` (`img_url`, `CarID`, `img_num`) VALUES ("."'"."$img_newName"."'".","."'".$lastcarID."'".","."'"."3"."'".")";
                    $rrr="uploads/".$img_newName;
                    mysqli_query($db,$imgqry);

                }else{
                    echo "you cannot upload files of this type";
                }
            }

        }else{

        }

        $car_pic1=$_FILES['pic4'];
        $fileName=$_FILES['pic4']['name'];
        $fileSize=$_FILES['pic4']['size'];
        $fileTmpname=$_FILES['pic4']['tmp_name'];
        $fileType=$_FILES['pic4']['type'];
        $fileError=$_FILES['pic4']['error'];



        if($fileError === 0){
            if($fileSize > 7000000){
                echo "Your file size is too big";
            }else{
                $imgex=pathinfo($fileName, PATHINFO_EXTENSION);
                $imgex_l=strtolower($imgex);
                $allowedex=array('jpg','jpeg','png');
                if(in_array($imgex_l,$allowedex)){
                    $img_newName=uniqid("IMG-",true).'.'.$imgex_l;
                    $img_up_path='uploads/'.$img_newName;
                    move_uploaded_file($fileTmpname,$img_up_path);
                    $imgqry="INSERT INTO `images` (`img_url`, `CarID`, `img_num`) VALUES ("."'"."$img_newName"."'".","."'".$lastcarID."'".","."'"."4"."'".")";
                    $rrr="uploads/".$img_newName;
                    mysqli_query($db,$imgqry);

                }else{
                    echo "you cannot upload files of this type";
                }
            }

        }else{

        }


        $car_pic1=$_FILES['pic5'];
        $fileName=$_FILES['pic5']['name'];
        $fileSize=$_FILES['pic5']['size'];
        $fileTmpname=$_FILES['pic5']['tmp_name'];
        $fileType=$_FILES['pic5']['type'];
        $fileError=$_FILES['pic5']['error'];



        if($fileError === 0){
            if($fileSize > 7000000){
                echo "Your file size is too big";
            }else{
                $imgex=pathinfo($fileName, PATHINFO_EXTENSION);
                $imgex_l=strtolower($imgex);
                $allowedex=array('jpg','jpeg','png');
                if(in_array($imgex_l,$allowedex)){
                    $img_newName=uniqid("IMG-",true).'.'.$imgex_l;
                    $img_up_path='uploads/'.$img_newName;
                    move_uploaded_file($fileTmpname,$img_up_path);
                    $imgqry="INSERT INTO `images` (`img_url`, `CarID`, `img_num`) VALUES ("."'"."$img_newName"."'".","."'".$lastcarID."'".","."'"."5"."'".")";
                    $rrr="uploads/".$img_newName;
                    mysqli_query($db,$imgqry);

                }else{
                    echo "you cannot upload files of this type";
                }
            }

        }else{

        }







    } else {

    }
    mysqli_commit($db);
    mysqli_close($db);
}else{
    echo "please fill all fields";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sale / SAyarti</title>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
<!--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" type="text/css" href="sayarti.css">-->
<!-- -->
<!--  <link rel="stylesheet" type="text/css" href="user-page.css">-->
<!---->
<!--    <link rel="stylesheet" type="text/css" href="sayarti.css">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!---->
<!--  <link rel="stylesheet" type="text/css" href="sayarti.css">-->
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

<br>
<br>
<br>
<br>























<div style=" margin-left: 30px; width:1000px; height: 2000px;">

<form method="post" action="selling.php" id="carform" enctype="multipart/form-data" >
<div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr" name="car_name">
</div>
<div class="form-group">
  <label for="fYEAR">Year:</label>
  <input type="number" class="form-control" id="Year" name="car_year">
</div>
<div class="form-group">
  <label for="fYEAR">KMs:</label>
  <input type="number" class="form-control" id="km" name="car_kms">
</div>
<div class="form-group">
  <label for="usr">Color:</label>
  <input type="text" class="form-control" id="Color" name="car_color">
</div>

  <label for="usr">Maker:</label>
  <select name="car_maker" class="custom-select">
    <option selected>make</option>
    <option value="volvo"  >Volvo</option>
    <option value="fiat" >Fiat</option>
    <option value="audi">Audi</option>
    <option value="Toyota" >Toyota</option>
    <option value="Seat" >Seat</option>
    <option value="Porsche" >Porsche</option>
    <option value="Opel" >Opel</option>
    <option value="Hyundai" >Hyundai</option>
    <option value="tesla" >tesla</option>
    <option value="Range Rover"  >Range Rover</option>
    <option value="Kia"  >Kia</option>
    <option value="Nissan"  >Nissan</option>
    <option value="Mercedes Benz" >Mercedes Benz</option>
    <option value="GMC"  >GMC</option>
    <option value="BMW"  >BMW</option>
    <option value="Volkswagen"  >Volkswagen</option>
    <option value="Chevrolet" >Chevrolet</option>
    <option value="Ford"  >Ford</option>
    <option value="Jeep"  >Jeep</option>
    <option value="Lotus"  >Lotus</option>
    <option value="MINI"  >MINI</option>
  </select>

<br><br>

  <label for="usr">Type:</label>
  <select name="car_type" class="custom-select">
    <option selected>Type</option>
    <option value="اقتصادية"  >اقتصادية</option>
    <option value="تجارية" >تجارية</option>
    <option value="رياضية"  >رياضية</option>
    <option value="عائلية"  >عائلية</option>
    <option value="فخمة"  >فخمة</option>
    <option value="كهربائية"  >كهربائية</option>
  </select>
<br><br><br>
    Description:
    <br>

<textarea name="car_desc" form="carform" style="width:400px; height: 300px;"></textarea>


  <br><br>
    <div class="form-group">
        <label for="usr">PRICE IN $:</label>
        <input type="text" class="form-control" id="usr" name="car_price">
    </div>


    <br><br>
  <label for="usr">Fuel:</label>
  <br>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio" name="car_fuel" value="diesel">
    <label class="custom-control-label" for="customRadio">diesel</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio2" name="car_fuel" value="petrol">
    <label class="custom-control-label" for="customRadio2">petrol</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio5" name="car_fuel" value="electric">
    <label class="custom-control-label" for="customRadio5">electric</label>
  </div>
  <br><br> <br><br>


  <label for="usr">Transmission:</label>
  <br>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio3" name="car_transmission" value="Automatic">
    <label class="custom-control-label" for="customRadio3">Automatic</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio4" name="car_transmission" value="gear">
    <label class="custom-control-label" for="customRadio4">gear </label>
  </div>
  <br><br><br>
  <div >

      Select Image Files to Upload:
      <br>
      <input type="file" name="pic1" multiple >
      <br>
        <input type="file" name="pic2" multiple >
      <br>
      <input type="file" name="pic3" multiple >
      <br>
      <input type="file" name="pic4" multiple >
      <br>
      <input type="file" name="pic5" multiple >
      <br>






  </div>
  <br><br>
  <input type="submit" class="btn btn-primary" name="save" value="save">





  <br>
  <br>
</form>







<br>
<br>




<script src="user-page.js"></script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>  <?php


}else{

    header('Location:lgin.php');
}






}else{

    header('Location:lgin.php');

}

?>
