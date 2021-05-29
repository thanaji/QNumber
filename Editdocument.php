<?php
session_start();
if (!$_SESSION['login']) {
    header("location: /qnumber/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "dbConn.php";?>
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
                    <p>Username</p>
                    
                </div>


            </div>

            <div class="nav-buttom">
                <div class="namesystem">
                    <p>ระบบออกเลขหนังสือราชการ</p>
                </div>
                <div class="statususer">
                    <p>status :  user/admin</p>
                </div>
            </div>

            <div class="navmenu">
                <li><a href="home.php">Home</a></li>
                <li><a href="requestadmin.php">กรอกขอเลข</a></li>
                <li><a href="activity.php">ดูประวัติทั้งหมด</a></li>
                <li><a href="Booktype.php">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.php">จัดการ user</a></li>
                
            </div>
            
        </div>
    </nav>

    <section id="AddDocument">

        <div class="container">
            <div class="frameitemAddD">
                <div class="itemAddD">

                    
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <h1>เเก้ไขเอกสาร</h1> <br>
                        <div class="inputdoc">
                            <label for="fname">จาก:&nbsp;</label>
                            <input type="text" id="sent" name="sent" placeholder="old data"><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="fname">ถึง:&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="to" name="to" placeholder="old data"><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เรื่อง:</label>
                            <input type="text" id="sname" name="sname" placeholder="old data"><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เบอร์:</label>
                            <input type="text" id="numphone" name="numphone" placeholder="old data"><br><br><br>
                        </div>

                        <div class="addpdf">
                            <a href="#" >&nbsp;&nbsp;&nbsp;&nbsp;เอกสาร.pdf</a>
                            <a href="#" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แนบไฟล์.pdf</a>
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