<?php
require("dbConn.php");
session_start();

if (!$_SESSION['login']) {
    header("location: /myphp/index.php");
    exit;
} else {
    $typeid = $_GET["typeid"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Type</title>

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
                    <?php
                    $selectuser = "select * from type where TypeID = '" . $typeid . "'";
                    $reql = $db->query($selectuser);
                    $rowuser = $reql->fetch_assoc();
                    ?>

                    <form action="saveedittype.php" method="POST" enctype="multipart/form-data">

                        <h1>แก้ไขประเภทเอกสาร</h1> <br>

                        <input type="text" name="typeid" hidden value="<?php echo $rowuser["TypeID"]; ?>">

                        <div class="inputdoc">
                            <label for="Name">ชื่อประเภท:</label>
                            <input type="text" id="Name" name="Name" value="<?php echo $rowuser["Name"]; ?>"><br><br><br>
                        </div>

                        <div class="inputdoc">
                            <label for="TypeNumber">เลข อว:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="TypeNumber" name="TypeNumber" value="<?php echo $rowuser['TypeNumber']; ?>"><br><br><br>
                        </div>

                        <div class="inputdoc">
                            <label for="current_number">เลขเริ่มต้น:</label>
                            <input type="text" id="current_number" name="current_number" value="<?php echo $rowuser['current_number']; ?>"><br><br><br>
                        </div>

                        <div class="inputdoc">
                            <label for="current_year">ปีปัจจุบัน:&nbsp;&nbsp;</label>
                            <input type="text" id="current_year" name="current_year" value="<?php echo $rowuser['current_year']; ?>"><br><br><br>
                        </div>

                        <div class="addsub">
                            <input type="submit" class="submit" name="submit" value="ตกลง">
                            <a href="Booktype.php" class="cancel">ยกเลิก</a>
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