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
            <li><a href="#">Home</a></li>
                <li><a href="requestadmin.php">กรอกขอเลข</a></li>
                <li><a href="#">ดูประวัติทั้งหมด</a></li>
                <li><a href="Documenttype.php">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.php">จัดการ user</a></li>
                
            </div>
            
        </div>
    </nav>

    <section id="tour">
        <div class="container">
 
            <div class="flex-user">
                <figure class="flex-user-item">
                    <h1>จัดการ user</h1>
                    <h1>user1</h1>
                    <div class="user">
                      <!-- user -->
                    </div>
                    <span id="myBtn">เพิ่ม User</span>
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
        <form action="/action_page.php">
            
            <div class="inputdoc">
                <label for="fname">ชื่อ:</label>
                <input type="text" id="fname" name="fname">
            </div>
            <div class="inputdoc">
                <label for="fname">นามสกุล:</label>
                <input type="text" id="fname" name="fname">
            </div>
            <div class="inputdoc">
                <label for="fname">email:</label>
                <input type="text" id="fname" name="fname">
            </div>
            <div class="inputdoc">
                <label for="fname">phone:</label>
                <input type="text" id="fname" name="fname">
            </div>

            <div class="checkboxad_or_u">
                <label for="status">&nbsp;&nbsp;&nbsp;status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label class="container">
                    <input type="radio" checked="checked" name="radio">
                    <span class="checkmark">admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  </label>
                  <label class="container">
                    <input type="radio" name="radio">
                    <span class="checkmark">user</span>
                  </label><br><br>
                <input  type="checkbox" id="vehicle1" name="vehicle1" value="Bike ">
                <label  for="vehicle1">ฝ่ายบริหารคณะวิศวกรรมศาสตร์ศรีราชา</label><br><br>    
                <input type="checkbox" id="vehicle2" name="vehicle2" value="Bike">
                <label for="vehicle2"> คณะวิศวกรรมศาสตร์ศรีราชา</label><br> <br>   
                <input type="checkbox" id="vehicle3" name="vehicle3" value="Bike">
                <label for="vehicle3"> โครงการพิเศษ</label><br><br>    
                <input type="checkbox" id="vehicle4" name="vehicle4" value="Bike">
                <label for="vehicle4"> สำนักงานเลขานุการ</label><br><br>    
                <input type="checkbox" id="vehicle5" name="vehicle5" value="Bike">
                <label for="vehicle5"> ภาควิชาวิศวกรรมอุตสาหกรรม</label><br><br>    
                <input type="checkbox" id="vehicle6" name="vehicle6" value="Bike">
                <label for="vehicle6"> ภาควิชาวิศวกรรมไฟฟ้า</label><br> <br>   
                <input type="checkbox" id="vehicle7" name="vehicle7" value="Bike">
                <label for="vehicle7"> ภาควิชาวิศวกรรมคอมพิวเตอร์</label><br><br>    
                <input type="checkbox" id="vehicle8" name="vehicle8" value="Bike">
                <label for="vehicle8"> ภาควิชาวิศวกรรมเครื่องกล</label><br><br>    
                <input type="checkbox" id="vehicle9" name="vehicle9" value="Bike">
                <label for="vehicle9"> ภาควิชาวิศวกรรมโยธา</label><br><br><br>   
            </div>

            


            <div class="addsub">
                <a href="#" style="border-right-width: 1px;margin-right: 93px;margin-bottom: 20px;" class="submit">ตกลง</a>
                <a href="#" class="cancel">ยกเลิก</a>

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


