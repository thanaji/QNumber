<?php
require("dbConn.php");
session_start();
date_default_timezone_set("Asia/Bangkok");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>
    <!-- BootStrap 5 By B ขีดกลางtext -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <!-- -- -- -- -- -- -->

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

</head>

<body>
    <!-- Nav Zone -->
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

    <!-- Section Zone -->
    <section id="tour">
        <div class="container mb-3 mt-3">
            <h1>Home</h1>
            <!-- <del>Strikethrough</del> ขีดเส้นกลาง -->
            <!-- <p class="text-decoration-line-through">This text has a line going through it.</p> ขีดเส้นกลาง -->

            <!-- Table Zone -->
            <table class="table table-striped table-bordered mydatatable" style="width:100%">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>เลขเอกสาร</th>
                        <th>ชื่อผู้รับ</th>
                        <th>ชื่อผู้ส่ง</th>
                        <th>เรื่อง</th>
                        <th>สถานะ</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <!-- ดึงข้อมูลจากDB document * -->
                    <?php
                    $selectdoc = "select * from document ";
                    $reql = $db->query($selectdoc);
                    while ($rowdoc = $reql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $rowdoc["Date"]; ?></td>
                            <!-- เลขเอกสาร +ต่อกัน -->
                            <td>
                                <?php
                                $docids = $rowdoc["DocumentID"];
                                $selectnumbook = "select document.TypeID,type.TypeID,type.TypeNumber from type JOIN document ON type.TypeID = document.TypeID WHERE document.DocumentID = '$docids'";
                                $reql2 = $db->query($selectnumbook);
                                $row2 = mysqli_fetch_array($reql2);
                                $typenum = $row2['TypeNumber'];
                                echo 'อว.6503' . $typenum . '/' . $rowdoc["resultNumber"];
                                ?>
                            </td>
                            <td><?php echo $rowdoc["Receive_Name"]; ?></td>
                            <td><?php echo $rowdoc["Sent_Name"]; ?></td>
                            <td><?php echo $rowdoc["Text"]; ?></td>
                            <td><?php if ($rowdoc["Status"] == 0) {
                                    echo "<p class='text-danger'>ยกเลิก</p>";
                                } else {
                                    echo $rowdoc["Status"];
                                }
                                ?></td>

                            <!-- ปุ่ม view, edit, cancel -->
                            <td class="table_edit">
                                <a href="#" class="btn btn-info view-detail" data-id="<?php echo $rowdoc["DocumentID"]; ?>" data-num="<?php echo 'อว.6503' . $typenum . '/' . $rowdoc["resultNumber"]; ?>" data-sentname="<?php echo $rowdoc["Sent_Name"]; ?>" data-resvname="<?php echo $rowdoc["Receive_Name"]; ?>" data-text="<?php echo $rowdoc["Text"]; ?>" data-status="<?php echo $rowdoc["Status"]; ?>">
                                    view
                                </a>
                                <a type="button" class="btn btn-success" href="Editdocument.php?docid=<?php echo $rowdoc["DocumentID"]; ?>">edit</a>
                                <a type="button" class="btn btn-danger" href="cancel_document.php?docid=<?php echo $rowdoc["DocumentID"]; ?>" onclick="return confirm('คุณต้องการที่จะยกเลิกข้อมูลนี้หรือไม่?');">cancel</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>วันที่</th>
                        <th>เลขเอกสาร</th>
                        <th>ชื่อผู้รับ</th>
                        <th>ชื่อผู้ส่ง</th>
                        <th>เรื่อง</th>
                        <th>สถานะ</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <!-- Modal Zone -->
    <div class="modal fade" id="view-detailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" name="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">

                    <label for="num">เลขเอกสาร</label>
                    <input type="text" name="num" id="num"><br>

                    <label for="sentname">ชื่อผู้ส่ง</label>
                    <input type="text" name="sentname" id="sentname"><br>

                    <label for="resvname">ชื่อผู้รับ</label>
                    <input type="text" name="resvname" id="resvname"><br>

                    <label for="text">เรื่อง</label>
                    <input type="text" name="text" id="text" ><br>

                    <label for="status">สถานะ</label>
                    <input type="text" name="status" id="status"><br>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('.mydatatable').DataTable();
    </script>
    <script type="text/javascript" src="viewmodal.js"></script>

</body>

</html>