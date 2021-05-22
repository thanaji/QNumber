<?php
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
    <title>AddDocument</title>

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
                    <p>
                        <?php
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
                    <p>status : user/admin</p>
                </div>
            </div>

            <div class="navmenu">
                <li><a href="#">Home</a></li>
                <li><a href="requestadmin.php">กรอกขอเลข</a></li>
                <li><a href="#">ดูประวัติทั้งหมด</a></li>
                <li><a href="Adddocuments.php">เพิ่มเอกสาร</a></li>
                <li><a href="Editdocument.php">เเก้ไขเอกสาร</a></li>
                <li><a href="#">จัดการ user</a></li>

            </div>

        </div>
    </nav>

    <section id="AddDocument">

        <div class="container">
            <div class="frameitemAddD">
                <div class="itemAddD">


                    <form action="insert.php" method="POST">

                        <h1>เพิ่มประเภทเอกสาร</h1> <br>
                        <div class="inputdoc">
                            <label for="fname">ชื่อเอกสาร:</label>
                            <input type="text" id="name" name="name"><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เลข อว:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="num" name="num"><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เลขเริ่มต้น:</label>
                            <input type="text" id="startnum" name="startnum"><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="fname">ปีปัจจุบัน:&nbsp;&nbsp;</label>
                            <input type="text" id="year" name="year"><br><br><br>
                        </div>

                        <div class="addsub">
                            <input type="submit" class="submit" name="submit" value="ตกลง">
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