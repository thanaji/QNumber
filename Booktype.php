<?php
require("dbConn.php");
session_start();
if (!$_SESSION['login']) {
    header("location: /qnumber/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Type</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" >
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
        <table class="table table-striped table-bordered mydatatable" style="width:100%">
            <thead>
                <tr>
                <th>เลข</th>
                <th>name</th>
                <th>num</th>
                <th>year</th>
                <th>edit</th>

                </tr>
            </thead>
            <tbody>
            <?php
                                $selectuser = "select * from type ";
                                $reql = $db->query($selectuser);
                                while ($rowuser = $reql->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $rowuser["TypeNumber"]; ?></td>
                                        <td><?php echo $rowuser["Name"]; ?></td>
                                        <td><?php echo $rowuser["current_number"]; ?></td>
                                        <td><?php echo $rowuser["current_year"]; ?></td>
                                        <td class="edit_booktype"> <a href="Edittype.php?typeid=<?php echo $rowuser["TypeID"]; ?>">edit</a></td>
                                    </tr>
                                <?php } ?>
                
                
                
               
            </tbody>
            <tfoot>
                <tr>
                <th>เลข</th>
                <th>Name</th>
                <th>num</th>
                <th>year</th>
                <th>edit</th>
                </tr>
            </tfoot>
        </table>
        <a href="Addtype.php" id="addcategory" class='ml-3 btn btn-primary'>เพิ่มประเภท</a>
  </div>



    <a href=""></a>



    </form>
    </div>
    <div class="modal-footer">
        <!-- footer adduser -->
    </div>
    </div>

    </div>
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('.mydatatable').DataTable();
</script>


</body>

</html>