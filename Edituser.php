<?php
require("dbConn.php");
session_start();

if (!$_SESSION['login']) {
    header("location: /myphp/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edituser</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

</head>

<body>
    <nav>
        <div class="container">
            <div class="nav-top">
                <div class="tital-logo">
                    <h1>KASETSART UNIVERSITY</h1>
                </div>

                <div class="nav-contact">
                    <p><?php
                        // echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                        echo  $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                        ?>
                        <a href="logout.php" class="view">Logout</a>
                    </p>

                </div>


            </div>

            <div class="nav-buttom">
                <div class="namesystem">
                    <p>ระบบออกเลขหนังสือราชการ</p>
                </div>
                <div class="statususer">
                    <p>status : <?php echo $_SESSION['AD_status']; ?></p>
                </div>
            </div>

            <div class="navmenu">
                <li><a href="#">Home</a></li>
                <li><a href="requestadmin.php">กรอกขอเลข</a></li>
                <li><a href="#">ดูประวัติทั้งหมด</a></li>
                <li><a href="Booktype.php">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.php">จัดการ user</a></li>

            </div>

        </div>
    </nav>

    <section id="AddDocument">

        <div class="container">
            <div class="frameitemAddD">
                <div class="itemAddD">


                    <form action="/action_page.php">
                        <h1>USER1</h1> <br>
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike ">
                        <label for="vehicle1">ฝ่ายบริหารคณะวิศวกรรมศาสตร์ศรีราชา</label><br>
                        <input type="checkbox" id="vehicle2" name="vehicle2" value="Bike">
                        <label for="vehicle2"> คณะวิศวกรรมศาสตร์ศรีราชา</label><br>
                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Bike">
                        <label for="vehicle3"> โครงการพิเศษ</label><br>
                        <input type="checkbox" id="vehicle4" name="vehicle4" value="Bike">
                        <label for="vehicle4"> สำนักงานเลขานุการ</label><br>
                        <input type="checkbox" id="vehicle5" name="vehicle5" value="Bike">
                        <label for="vehicle5"> ภาควิชาวิศวกรรมอุตสาหกรรม</label><br>
                        <input type="checkbox" id="vehicle6" name="vehicle6" value="Bike">
                        <label for="vehicle6"> ภาควิชาวิศวกรรมไฟฟ้า</label><br>
                        <input type="checkbox" id="vehicle7" name="vehicle7" value="Bike">
                        <label for="vehicle7"> ภาควิชาวิศวกรรมคอมพิวเตอร์</label><br>
                        <input type="checkbox" id="vehicle8" name="vehicle8" value="Bike">
                        <label for="vehicle8"> ภาควิชาวิศวกรรมเครื่องกล</label><br>
                        <input type="checkbox" id="vehicle9" name="vehicle9" value="Bike">
                        <label for="vehicle9"> ภาควิชาวิศวกรรมโยธา</label><br><br>
                        <label class="container">
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark">admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </label>
                        <label class="container">
                            <input type="radio" name="radio">
                            <span class="checkmark">user</span>
                        </label>


                        <div class="addsub">
                            <a href="#" class="submit">ตกลง</a>
                            <a href="#" class="cancel">ยกเลิก</a>

                        </div>



                    </form>

                </div>


            </div>



        </div>




    </section>

    <footer id="footerAddD">
        <div class="container">
            <div class="footer1">
                <p>contact</p>
            </div>
        </div>


    </footer>
</body>

</html>