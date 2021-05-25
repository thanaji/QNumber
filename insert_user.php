<?php
include "dbConn.php"; // Using database connection file here
$allname = array('');
if(isset($_POST['submit']))
{	
    $fullname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['ename'];
    $phonenum = $_POST['phonenum'];

    if(isset($_POST['radio1']))
    {
        $ral1 = $_POST['radio1'];
        echo $ral1;
    }

    /*if(isset($_POST['radio2']))
    {
        $ral2 = $_POST['radio2'];
        echo $ral2;
    }*/

    if(isset($_POST['chk1']))
    {
        $chk1 = $_POST['chk1'];
        array_push($allname,$chk1);        
    }

    if(isset($_POST['chk2']))
    {
        $chk2 = $_POST['chk2'];
        array_push($allname,$chk2);   
    }

    if(isset($_POST['chk3']))
    {
        $chk3 = $_POST['chk3'];
        array_push($allname,$chk3);   
    }

    if(isset($_POST['chk4']))
    {
        $chk4 = $_POST['chk4'];
        array_push($allname,$chk4);   
    }

    if(isset($_POST['chk5']))
    {
        $chk5 = $_POST['chk5'];
        array_push($allname,$chk5);   
    }

    if(isset($_POST['chk6']))
    {
        $chk6 = $_POST['chk6'];
        array_push($allname,$chk6);   
    }

    if(isset($_POST['chk7']))
    {
        $chk7 = $_POST['chk7'];
        array_push($allname,$chk7);   
    }

    if(isset($_POST['chk8']))
    {
        $chk8 = $_POST['chk8'];
        array_push($allname,$chk8);   
    }

    if(isset($_POST['chk9']))
    {
        $chk9 = $_POST['chk9'];
        array_push($allname,$chk9);   
    }


    print_r($allname);
    $utype = "";

    foreach ($allname as $data) {
        $utype = $utype . $data;
      }
    echo $utype;

    if(isset($_POST['radio1']))
    {
        $insert = mysqli_query($db,"INSERT INTO `user`(`Status`,`Name`,`Surname`,`Email`,`Phone`) VALUES ('$ral1','$fullname','$lastname','$email','$phonenum')");
        $sql = "SELECT UserID FROM user WHERE Email='$email' ";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               $useradd = $row["UserID"];
            }
        }
        $insert = mysqli_query($db,"INSERT INTO `permission`(`UserID`,`TypeUseID`) VALUES ('$useradd','$utype')");
    }

    else{
        echo "else";
    }




    #$insert = mysqli_query($db,"INSERT INTO `user`(`Status`,`Name`,`Surname`,`Email`,`Phone`) VALUES ('$number','$fullname','$startnum','$year')");

    
  /*  if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        echo "Records added successfully.";
    }*/
}

mysqli_close($db); // Close connection
?>
