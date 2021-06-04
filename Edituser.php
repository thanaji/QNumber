<?php
require("dbConn.php");
session_start();
#print_r($_SESSION);

if (!$_SESSION['login']) {
    header("location: /qnumber/index.php");
    exit;
}else {
    $staruserid = $_GET["userid"];
    $_SESSION["userid"] = $staruserid;
    #echo $staruserid;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edituser</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

</head>

<body>
    <?php
        $count = 1;
        $selectuser = "select * from permission where UserID = '$staruserid'";
        $reql = $db->query($selectuser);
        $rowuser = $reql->fetch_assoc();
        $userid = $rowuser["UserID"];
        $typeuseid = $rowuser["TypeUseID"];
        $addarr = strlen($typeuseid);
        $ii = 0;
        #print_r($rowuser);

        $selectuser = "select * from user where UserID = $staruserid";
        $reql = $db->query($selectuser);
        $rowuser = $reql->fetch_assoc();
        $fullname = $rowuser["Name"];
        $lastname = $rowuser["Surname"];
        $status_user = $rowuser["Status"];

        $selecttypeuse = "select TypeUseID from permission where UserID = $staruserid";
        $reqltype = $db->query($selecttypeuse);
        #$rowtypeuse = $reqltype->fetch_assoc(); 

        $listusetype = array('');
        while($rowtypeuse = $reqltype->fetch_assoc()) { 
            array_push($listusetype,$rowtypeuse['TypeUseID']);
          }
        #print_r($listusetype);
        
        
    ?>
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

    <section id="AddDocumentU">

        <div class="container">
            <div class="frameitemAddU">
                <div class="itemAddD">
                        <form action="update_user.php" method="POST" >
                                <h2>ชื่อ : <?php echo $fullname ."  ". $lastname;?></h2>
                                <label for="status">&nbsp;&nbsp;&nbsp;status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <?php
                                    $selectuser = "select * from user where UserID = '" . $userid . "'";
                                    $reql = $db->query($selectuser);
                                    $rowuser = $reql->fetch_assoc(); 
                                    #echo $rowuser['Status'];
                                ?>
                                    <div class="inputdoc">
                                        <label for="Name">ชื่อ:</label>
                                        <input type="text" id="Name" name="Name" value="<?php echo $rowuser["Name"]; ?>">
                                    </div>

                                    <div class="inputdoc">
                                        <label for="Surname">นามสกุล:</label>
                                        <input type="text" id="Surname" name="Surname" value="<?php echo $rowuser["Surname"]; ?>">
                                    </div>

                                    <div class="inputdoc">
                                        <label for="Email">Email:</label>
                                        <input type="email" id="Email" name="Email" value="<?php echo $rowuser["Email"]; ?>">
                                    </div>

                                    <div class="inputdoc">
                                        <label for="Phone">Phonenumber:</label>
                                        <input type="text" id="Phone" name="Phone" value="<?php echo $rowuser["Phone"]; ?>">
                                    </div>
                                <?php if($status_user == 'admin')
                                {?>
                                <label class="container">
                                    <input type="radio" checked="checked" name="radio1" value="admin">
                                    <span class="checkmark">admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </label>
                                <label class="container">
                                    <input type="radio" name="radio1" value ="user">
                                    <span class="checkmark">user</span>
                                </label><br>
                                <?php }else{
                                ?>
                                    <label class="container">
                                    <input type="radio"  name="radio1" value="admin">
                                    <span class="checkmark">admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </label>
                                <label class="container">
                                    <input type="radio" checked="checked" name="radio1" value ="user">
                                    <span class="checkmark">user</span>
                                </label><br>
                                <?php } ?>


                                <?php
                                    $namearr = array('');
                                    $selectuser = "select Name from type";
                                    $reql = $db->query($selectuser);
            
                                    while($row = mysqli_fetch_array($reql)){
                                        array_push($namearr,$row['Name']);
                                    }

                                    #echo $userid;
                                    #print_r($namearr);
                                    $nameadd = count($namearr);
                                    #echo $nameadd;
                                    $_SESSION['nameadd'] = $nameadd;
                                    
                                    $start = 1;
                                    while($start < $nameadd)
                                    {
                                        $selectbook = "select TypeID from type where Name = '$namearr[$start]'";
                                        $reql2 = $db->query($selectbook);
                                        $rowbook = $reql2->fetch_assoc();
                                        $typebookid = $rowbook["TypeID"];
                                        #print_r($typebookid);

                                        if(in_array($typebookid, $listusetype))
                                        {?>
                                            <input  type="checkbox" id="chk<?php echo $start;?>" name="chk<?php echo $start;?>" value="<?php echo $typebookid ?>" checked="checked">
                                            <label  for="vehicle1"><?php echo $namearr[$start];?></label><br><br>
                                        <?php }
                                        else{ 
                                        ?>  
                                            <input  type="checkbox" id="chk<?php echo $start;?>" name="chk<?php echo $start;?>" value="<?php echo $typebookid ?>">
                                            <label  for="vehicle1"><?php echo $namearr[$start];?></label><br><br>
                                        <?php }  
                                        $start += 1;}
                                ?>
                                <div class="addsub">
                                    <input type="submit" class="submit" name="submit" value="ตกลง">
                                    <a href="manage_user.php" class="cancel">ยกเลิก</a>
                                </div>  
                        </form>
                        
                </div>


            </div>

        </div>

    </section>

    <!-- <footer id="footerAddD">
        <div class="container">
            <div class="footer1">
                <p>contact</p>
            </div>
        </div>


    </footer> -->
</body>

</html>