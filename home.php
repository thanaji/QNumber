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

    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .modal-body {
            padding: 2px 16px;
        }

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }
    </style>

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
                        <th>วันที่</th>
                        <th>ชื่อผู้รับ</th>
                        <th>เรื่อง</th>
                        <th>สถานะ</th>
                        <th>เเก้ไขเเละยกเลิก</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selectdoc = "select * from document ";
                    $reql = $db->query($selectdoc);

                    while ($rowdoc = $reql->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $rowdoc["DocumentID"]; ?></td>
                            <td><?php echo $rowdoc["resultNumber"]; ?></td>
                            <td><?php echo $rowdoc["Sent_Name"]; ?></td>
                            <td><?php echo $rowdoc["Date"]; ?></td>
                            <td><?php echo $rowdoc["Receive_Name"]; ?></td>
                            <td><?php echo $rowdoc["Text"]; ?></td>
                            <td><?php echo $rowdoc["Status"]; ?></td>
                            <td class="table_edit">
                                <a id="myBtn" href="#myModal?docid=<?php $_SESSION['docid'] = $rowdoc["DocumentID"];
                                                                    echo $_SESSION['docid']; ?>">ดูรายละเอียด</a>
                                <a class="edit" href="Editdocument.php?docid=<?php echo $rowdoc["DocumentID"]; ?>">แก้ไข&nbsp;&nbsp;&nbsp;</a>
                                <a class="delete" href="cancel_document.php?docid=<?php echo $rowdoc["DocumentID"]; ?>" onclick="return confirm('คุณต้องการที่จะยกเลิกข้อมูลนี้หรือไม่?');">ยกเลิก</a>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>เลขอว.</th>
                        <th>ชื่อผู้ส่ง</th>
                        <th>วันที่</th>
                        <th>ชื่อผู้รับ</th>
                        <th>เรื่อง</th>
                        <th>สถานะ</th>
                        <th>เเก้ไขเเละยกเลิก</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </section>


    <!-- Trigger/Open The Modal -->


    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>รายละเอียดเอกสาร</h2>
                <span class="close">&times;</span>

            </div>
            <div class="modal-body">
                <?php
                $docid = $_SESSION['docid'];

                $selectdoc2 = "select * from document where DocumentID = '" . $docid . "'";
                $reql = $db->query($selectdoc2);
                $rowdoc2 = $reql->fetch_assoc();

                ?>
                <label for="tinput">เลขเอกสาร:</label>
                <label for="showdoc">อว.<?php echo $rowdoc2["resultNumber"]; ?></label><br><br>
                
                <!-- <p class="text-muted"><?php echo $rowdoc2["Date"]; ?></p><br><br> -->
                <label for="tinput">วันที่:</label>
                <label for="showdoc"><?php echo $rowdoc2["Date"]; ?></label><br><br>
                <label for="tinput">ชื่อผู้ส่ง:</label>
                <label for="showdoc"><?php echo $rowdoc2["Sent_Name"]; ?></label><br><br>
                <label for="tinput">ชื่อผู้รับ:</label>
                <label for="showdoc"><?php echo $rowdoc2["Receive_Name"]; ?></label><br><br>
                <label for="tinput">เรื่อง:</label>
                <label for="showdoc"><?php echo $rowdoc2["Text"]; ?></label><br><br>
                <label for="tinput">เบอร์โทร:</label>
                <label for="showdoc"><?php echo $rowdoc2["Phone"]; ?></label><br><br>
                <label for="tinput">แนบไฟล์:</label>
                <label for="showdoc"><?php echo $rowdoc2["Filee"]; ?></label><br><br>
            </div>
        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>




    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('.mydatatable').DataTable();
    </script>

</body>

</html>