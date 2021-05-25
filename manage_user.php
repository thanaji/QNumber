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

<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
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

.modal-body {padding: 2px 16px;}

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
                    <p><?php
                        // echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                        echo  $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                        ?>
                        <a href="logout.php" class="view">Logout</a></p>
                    
                </div>


            </div>

            <div class="nav-buttom">
                <div class="namesystem">
                    <p>ระบบออกเลขหนังสือราชการ</p>
                </div>
                <div class="statususer">
                    <p>status :  <?php echo $_SESSION['AD_status']; ?></p>
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
                    <h1>จัดการ user</h1>
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Staatus</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selectuser = "select * from user ";
                                $reql = $db->query($selectuser);
                                while ($rowuser = $reql->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $rowuser["UserID"]; ?></td>
                                        <td><?php echo $rowuser["Status"]; ?></td>
                                        <td><?php echo $rowuser["Name"]; ?></td>
                                        <td><?php echo $rowuser["Surname"]; ?></td>
                                        <td><?php echo $rowuser["Email"]; ?></td>
                                        <td><?php echo $rowuser["Phone"]; ?></td>
                                        <td><a href="Edituser.php?typeid=<?php echo $rowuser["UserID"]; ?>">edit</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="user">
                      <!-- user -->
                    </div>
                    <span id="myBtn" style="margin-right: 200px;" >เพิ่ม User</span>
                </figure>
            </div>
        </div>
    </section>




<a href=""></a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>เพิ่มuser</h2>
    </div>
    <div class="modal-body">
        <form action="insert_user.php" method="POST">
            
            <div class="inputdoc">
                <label for="fname">ชื่อ:</label>
                <input type="fname" id="fname" name="fname" required>
            </div>
            <div class="inputdoc">
                <label for="lname">นามสกุล:</label>
                <input type="lname" id="lname" name="lname" required>
            </div>
            <div class="inputdoc">
                <label for="ename">email:</label>
                <input type="ename" id="ename" name="ename" required>
            </div>
            <div class="inputdoc">
                <label for="phonenum">phone:</label>
                <input type="phonenum" id="phonenum" name="phonenum" required>
            </div>

            <div class="checkboxad_or_u">
                <label for="status">&nbsp;&nbsp;&nbsp;status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label class="container">
                    <input type="radio" checked="checked" name="radio1" value="admin">
                    <span class="checkmark">admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  </label>
                  <label class="container">
                    <input type="radio" name="radio1" value ="user">
                    <span class="checkmark">user</span>
                  </label><br><br>
                <input  type="checkbox" id="chk1" name="chk1" value="1">
                <label  for="vehicle1">ฝ่ายบริหารคณะวิศวกรรมศาสตร์ศรีราชา</label><br><br>    
                <input type="checkbox" id="chk2" name="chk2" value="2">
                <label for="vehicle2"> คณะวิศวกรรมศาสตร์ศรีราชา</label><br> <br>   
                <input type="checkbox" id="chk3" name="chk3" value="3">
                <label for="vehicle3"> โครงการพิเศษ</label><br><br>    
                <input type="checkbox" id="chk4" name="chk4" value="4">
                <label for="vehicle4"> สำนักงานเลขานุการ</label><br><br>    
                <input type="checkbox" id="chk5" name="chk5" value="5">
                <label for="vehicle5"> ภาควิชาวิศวกรรมอุตสาหกรรม</label><br><br>    
                <input type="checkbox" id="chk6" name="chk6" value="6">
                <label for="vehicle6"> ภาควิชาวิศวกรรมไฟฟ้า</label><br> <br>   
                <input type="checkbox" id="chk7" name="chk7" value="7">
                <label for="vehicle7"> ภาควิชาวิศวกรรมคอมพิวเตอร์</label><br><br>    
                <input type="checkbox" id="chk8" name="chk8" value="8">
                <label for="vehicle8"> ภาควิชาวิศวกรรมเครื่องกล</label><br><br>    
                <input type="checkbox" id="chk9" name="chk9" value="9">
                <label for="vehicle9"> ภาควิชาวิศวกรรมโยธา</label><br><br><br>   
            </div>  
            <div class="addsub">
              <input type="submit" class="submit" name="submit" value="ตกลง">
              <a href="manage_user.php" class="cancel">ยกเลิก</a>
            </div>
            
        </form>
    </div>
    <div class="modal-footer">
       <!-- footer adduser -->
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

</body>
</html>


