<?php
session_start();
if(isset($_SESSION['ismember'])){
if($_SESSION['ismember']==1){
$s1=0;


$ID12=$_POST['carinfo'];
$db = new mysqli('localhost', 'root', '', 'sayarti');
$qry="select * from car where ID=".$_POST['carinfo'] ;
$res=$db->query($qry);
$row=$res->fetch_assoc();
$picqr1="select * from images where CarID="."'".$row['ID']."' and img_num=1";
$picqr2="select * from images where CarID="."'".$row['ID']."' and img_num=2";
$picqr3="select * from images where CarID="."'".$row['ID']."' and img_num=3";
$picqr4="select * from images where CarID="."'".$row['ID']."' and img_num=4";
$picqr5="select * from images where CarID="."'".$row['ID']."' and img_num=5";
$res1=$db->query($picqr1);
$res2=$db->query($picqr2);
$res3=$db->query($picqr3);
$res4=$db->query($picqr4);
$res5=$db->query($picqr5);
$pic1=$res1->fetch_assoc();
$pic2=$res2->fetch_assoc();
$pic3=$res3->fetch_assoc();
$pic4=$res4->fetch_assoc();
$pic5=$res5->fetch_assoc();
if($pic1!=null) {
    $p1 = "uploads/" . $pic1['img_url'];
}else{
    $p1 = "web porject/null.png";
}
    if($pic2!=null) {
        $p2="uploads/".$pic2['img_url'];
    }else{
        $p2 = "web porject/null.png";
    }
    if($pic3!=null) {
        $p3="uploads/".$pic3['img_url'];
    }else{
        $p3 = "web porject/null.png";
    }
    if($pic4!=null) {
        $p4="uploads/".$pic4['img_url'];
    }else{
        $p4 = "web porject/null.png";
    }
    if($pic5!=null) {
        $p5="uploads/".$pic5['img_url'];
    }else{
        $p5 = "web porject/null.png";
    }
//$p2="uploads/".$pic2['img_url'];
//$p3="uploads/".$pic3['img_url'];
//$p4="uploads/".$pic4['img_url'];
//$p5="uploads/".$pic5['img_url'];


?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Car review / SAyarti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="sayarti.css">
    <link rel="stylesheet" type="text/css" href="CarReview.css">
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
<header style="width: 100%; height: 600px;  ">
    <table style="width: 100%; height: 100%;">
        <th style="width: 50%; ">

 <div style="width: 100%; height: 600px; border-radius: 10px; position: relative; left:30px;">
     <img style="width: 100%; height: 100%; border-radius: 10px; object-fit: contain" src="<?php echo $p1 ?>">
 </div>
            <div style=" position: absolute; bottom: 40px; left: 35px">
                <div class='myGallery'>


                    <div class='item'>
                        <img class='small-image' src='<?php echo $p2 ?>' onclick='showModal()'/>
                        <span class="caption" >Click to view original size</span>
                    </div>
                    <div class="item">
                        <img class='small-image' src='<?php echo $p3 ?>' onclick='showModal()'/>
                        <span class="caption" >Click to view original size</span>
                    </div>
                    <div class="item">
                        <img class="small-image" src="<?php echo $p4 ?>" onclick="showModal()" />
                        <span class="caption" >Click to view original size</span>
                    </div>
                    <div class="item">
                        <img class="small-image" src="<?php echo $p5 ?>" onclick="showModal()"/>
                        <span class="caption" onclick="showModal()">Click to view original size</span>
                    </div>

                </div>
            </div>


        </th>
        <th style="width: 50%;   ">
            <div style="  position: relative; left:200px; width: 400px; height: 500px; box-shadow: 5px 10px ;  background-color: #89ccec; border-radius: 10px; ">
                <table style="width: 95%; height: 100%; position: relative;left: 5px;">
                    <tr>
                        <td><span style="font-family: 'JetBrains Mono ExtraBold'; font-size: 25px; " >Make:</span></td>
                        <td><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['Make'] ?></span></td>
                    </tr>
                    <tr>
                        <td ><span style="font-family:  'JetBrains Mono ExtraBold';font-size: 25px">Model:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['carName'] ?></span></td>
                    </tr>

                    <tr>
                        <td ><span style="font-family:  'JetBrains Mono ExtraBold';font-size: 25px">Year:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['Year'] ?></span></td>
                    </tr>

                    <tr>
                        <td ><span style="font-family: 'JetBrains Mono ExtraBold';font-size: 25px">KM:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['KM'] ?></span></td>
                    </tr>

                    <tr>
                        <td ><span style="font-family:  'JetBrains Mono ExtraBold';font-size: 25px">Transmission:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['Transmission'] ?></span></td>
                    </tr>

                    <tr>
                        <td ><span style="font-family:  'JetBrains Mono ExtraBold';font-size: 25px">Type:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['type'] ?></span></td>
                    </tr>

                    <tr>
                        <td ><span style="font-family:  'JetBrains Mono ExtraBold';font-size: 25px">Fuel:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['Fuel'] ?></span></td>
                    </tr>

                    <tr>
                        <td ><span style="font-family: 'JetBrains Mono ExtraBold';font-size: 25px">Color:</span></td>
                        <td ><span style="font-family: 'Candara Light';font-size: 25px"><?php echo $row['Color'] ?></span></td>
                    </tr>





                </table>
            </div>

        </th>

    </table>
</header>



<div id="show_image_popup">
    <div class="close-btn-area">

        <button id="close-btn">X</button>
    </div>
    <div id="image-show-area" style="height: 30px;">
        <img id="large-image" src="" alt="">
    </div>
</div>
<script type="text/javascript">
    var small_images  = document.getElementsByClassName("small-image");
    var show_image_popup  = document.getElementById("show_image_popup");
    var large_image  = document.getElementById("large-image");
    var close_btn = document.getElementById("close-btn");

    for(var i=0; i< small_images.length; i++){

        small_images[i].addEventListener("click", function(){
            // remove active class from every images
            for(var j=0; j< small_images.length; j++){
                small_images[j].classList.remove('active');
            }
            // end

            this.classList.add('active'); // add active class to this image

            var src_val = this.src;
            large_image.src = src_val;
            showModal();
        });
    }


    function showModal(){
        show_image_popup.style.display = 'block';
    }

    close_btn.addEventListener("click", function(){
        // before colose the modal we need to remove active class
        for(var i=0; i< small_images.length; i++){
            small_images[i].classList.remove('active');
        }
        // end
        closeModal();
    });

    function closeModal(){
        show_image_popup.style.display = 'none';
    }
</script>
<br>
<br>
<header style="width: 100%; height: 50px;">
    <div style="width: 100%;height: 50px; background-color: #223a42">
        <center><span style="font-size: 40px; position: relative; bottom: 8px; color: whitesmoke">Offered for sale for :  <?php echo $row['price']." $"
        ?></span></center>
    </div>


</header>

<div style="width: 100%; height: 500px; border:solid dodgerblue 2px;border-bottom: hidden">

    <div style="width: 70%; height: 400px; border:solid dodgerblue 2px; margin: 50px; margin-left: 150px; background-color: ghostwhite; box-shadow: 5px 10px ;">

        <table style="width: 100%; height: 100%">

            <th style=" width: 30%;">

                <div style=" margin-top:-195px;"><center style="font-size: 20px">OWNER</center></div>

                <div >
                    <center> <img src="web porject/prf.png" class="image--cover" style="border: 2px solid dodgerblue; position: relative; top:40px;">

                        <img>
                    </center>
                </div>
                <div style=" position: absolute; top :1150px; height: 80px; left: 210px; width: 200px;">

                    <a href="user-page.php"> <center style="font-size: 20px"><?php echo $_SESSION['username'] ?></center> </a>
                </div>
            </th>
            <th style=" width: 30%;">

                <table style="width: 100%; height: 100%">

                    <tr>
                        <th style=" text-align: center; height: 50px; font-size: 20px">
                            ADDITIONAL INFO
                        </th>

                    </tr>
                    <tr>
                        <th style=" height: 170px;">
                            <div>CONTACT NUMBER:</div>
                            <p style=" color: royalblue; text-align: center; position: relative; top:20px; font-size: 25px; width: 100%"><?php echo $_SESSION['contactnum'] ?></p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div style="position: relative; top: -50px;"> POSTED ON: </div>
                            <div style=" text-align: center; font-size: 25px; color: royalblue"> <?php  echo $row['posted_on']
                            ?></div>
                        </th>
                    </tr>
                </table>






            </th>



            <th style="">
                <table style="width: 100%;height: 100%;">
                    <tr>
                        <th style="width: 100%; height: 40px; text-align: center; font-size: 20px">
                            DESCRIPTION
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 100%;  text-align: center">

                            <dl style="margin-left: 10px">
                                <dd style="color: royalblue">

                                    <?php echo $row['Desc'] ?>
                                </dd>
                            </dl>
                        </th>
                    </tr>
                </table>

            </th>




        </table>


    </div>


</div>
<?php
if($_SESSION['UserLevel']==1){
    echo "
    <div style='height: 100px; width: 100%;'>
    <form method='post' action='admindeletecar.php'>
   <button name='del' value='$ID12' style='margin-left: 720px; margin-top: 30px; width: 120px; border: hidden; background-color: darkcyan; border-radius: 10px;'> DELETE</button>
</form>
</div>
    ";
}

?>

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