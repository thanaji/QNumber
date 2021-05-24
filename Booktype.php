<?php
require("dbConn.php");
session_start();
if (!$_SESSION['login']) {
    header("location: /myphp/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Type</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- BootStrap -->
    <link rel="stylesheet" href="/learnphp/theme/css/bootstrap-theme.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
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
                <li><a href="Booktype.php">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.php">จัดการ user</a></li>

            </div>

        </div>
    </nav>

    <section id="tour">
        <div class="container">

            <div class="flex-user">
                <figure class="flex-user-item">
                    <h1>ประเภทเอกสาร</h1>
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>เลข</th>
                                    <th>Name</th>
                                    <th>num</th>
                                    <th>year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selectuser = "select * from type ";
                                $reql = $db->query($selectuser);
                                while ($rowuser = $reql->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $rowuser["TypeID"]; ?></td>
                                        <td><?php echo $rowuser["TypeNumber"]; ?></td>
                                        <td><?php echo $rowuser["Name"]; ?></td>
                                        <td><?php echo $rowuser["current_number"]; ?></td>
                                        <td><?php echo $rowuser["current_year"]; ?></td>
                                        <td> <a href="Edittype.php?typeid=<?php echo $rowuser["TypeID"]; ?>">edit</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="user">
                        <!-- user -->
                    </div>
                    <a href="Addtype.php" id="addcategory" class='ml-3 btn btn-primary'>เพิ่มประเภท</a>
                </figure>
            </div>
        </div>
    </section>




    <a href=""></a>



    </form>
    </div>
    <div class="modal-footer">
        <!-- footer adduser -->
    </div>
    </div>

    </div>



</body>

</html>