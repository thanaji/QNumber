<?php
require("dbConn.php");
session_start();
if (!$_SESSION['login']) {
    header("location: /qnumber/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
                        //echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
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
                <li><a href="home.php">Home</a></li>
                <li><a href="requestadmin.php">กรอกขอเลข</a></li>
                <li><a href="activity.php">ดูประวัติทั้งหมด</a></li>
                <li><a href="Booktype.php">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.php">จัดการ user</a></li>

            </div>

        </div>
    </nav>
    <section id="tour">
    <div class="container mb-3 mt-3">
        <h1>Home</h1>
        <table class="table table-striped table-bordered mydatatable" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>เลขอว.</th>
                    <th>ชื่อผู้ส่ง</th>
                    <th>ชื่อผู้รับ</th>
                    <th>สถานะ</th>
                    <th>การกระทำ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectuser = "select * from document ";
                $reql = $db->query($selectuser);
                while ($rowuser = $reql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $rowuser["DocumentID"]; ?></td>
                        <td><?php echo $rowuser["resultNumber"]; ?></td>
                        <td><?php echo $rowuser["Sent_Name"]; ?></td>
                        <td><?php echo $rowuser["Receive_Name"]; ?></td>
                        <td><?php echo $rowuser["Status"]; ?></td>
                        <td class="table_edit">
                            <a class="edit" href="?docid=<?php echo $rowuser["DocumentID"];?>">รายละเอียด&nbsp;&nbsp;&nbsp;</a>
                            <a class="edit" href="Editdocument.php?docid=<?php echo $rowuser["DocumentID"];?>">แก้ไข&nbsp;&nbsp;&nbsp;</a>
                            <a class="delete" href="cancel_document.php?docid=<?php echo $rowuser["DocumentID"]; ?>" onclick="return confirm('คุณต้องการที่จะยกเลิกข้อมูลนี้หรือไม่?');">ยกเลิก</a>
                        </td>
                    </tr>
                <?php } ?>


            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>เลขอว.</th>
                    <th>ชื่อผู้ส่ง</th>
                    <th>ชื่อผู้รับ</th>
                    <th>สถานะ</th>
                    <th>การกระทำ</th>
                </tr>
            </tfoot>
        </table>
      
    </div>
    </section>

    


    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script> -->

</body>

</html>