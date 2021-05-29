<?php
include "dbConn.php"; // Using database connection file here
session_start();
$addnum = $_SESSION['nameadd'];
if(isset($_POST['submit']))
{	
    $fullname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['ename'];
    $phonenum = $_POST['phonenum'];

    if(isset($_POST['radio1']))
    {
        $ral1 = $_POST['radio1'];
        #echo $ral1;
    }

    $countloop = 1;
    $newword = array('');
    while($countloop < $addnum)
    {
        if(isset($_POST['chk'.$countloop]))
        {
            $ina = $_POST['chk'.$countloop];
            #echo $ina;
            array_push($newword,$ina);
        }
        $countloop += 1;
    }

    print_r($newword);
    $cnew = count($newword);
    #echo $cnew;

    /*foreach ($allname as $data) {
        $utype = $utype. $data .'.';
      }
    echo $utype;*/

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

        #echo $useradd;
        $countloop = 1;
        while($countloop < $cnew)
        {
            echo $newword[$countloop];
            #echo $newword[$countloop];
            $insert = mysqli_query($db,"INSERT INTO `permission`(`UserID`,`TypeUseID`) VALUES ('$useradd','$newword[$countloop]')");
            $countloop += 1;
        }
    }
    


}

mysqli_close($db); // Close connection
header("location: manage_user.php");
?>
