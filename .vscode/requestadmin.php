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
    <title>request</title>

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
                <li><a href="requestadmin.html">กรอกขอเลข</a></li>
                <li><a href="#">ดูประวัติทั้งหมด</a></li>
                <li><a href="Documenttype.html">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.html">จัดการ user</a></li>

            </div>

        </div>
    </nav>

    <section id="AddDocument">

        <div class="container">
            <div class="frameitemAddD">
                <div class="itemAddD">


                    <form action="/action_page.php">
                        <h1>เเก้ไขเอกสาร</h1>
                        <div class="inputdoc">
                            <label for="fname">เลือกประเภท:</label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">ลงวันที่:&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">จาก:</label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">ถึง:</label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เรื่อง:</label>
                            <input type="text" id="fname" name="fname">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เบอร์:</label>
                            <input type="text" id="fname" name="fname">
                        </div>

                        <div class="addpdf">
                            <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;เอกสาร.pdf</a>
                            <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แนบไฟล์.pdf</a>
                        </div>


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