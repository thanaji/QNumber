<?php
    include "dbConn.php";
    session_start();
    #print_r($_SESSION);
    #$oldtypeuse = $_SESSION['oldtypeuse'];
    $starindex = 2;
    $chkid = 1;
    $nameadd = $_SESSION['nameadd'];
    $userid = $_SESSION["userid"];
    $newword = array('');
    $ii = 1;
    #echo $nameadd;

    if(isset($_POST['submit']))
    {	
        $fullname = $_POST['Name'];
        $surname = $_POST['Surname'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $radi = $_POST['radio1'];
        #echo "$radi";
        while($ii < $nameadd)
        {
            if(isset($_POST['chk'.$chkid])){
                $ina = $_POST['chk'.$chkid];
                #echo $ina;
                array_push($newword,$ina);
            }
            $ii += 1;
            $chkid += 1;
        }
        $cnew = count($newword);
        print_r($newword);

        $cleanuser = "delete from permission where UserID = '".$userid."'";
        if ($reql = $db->query($cleanuser)) {
            echo "Record clea successfully<br>";
        }

        $ii = 1;
        $countloop = 1;
        while($countloop < $cnew)
        {
            $insert = mysqli_query($db,"INSERT INTO `permission`(`UserID`,`TypeUseID`) VALUES ('$userid','$newword[$countloop]')");
            $countloop += 1;
        }



    }

    $selectuser = "update user  set Status = '$radi',Name = '$fullname',Surname ='$surname',Email='$email',Phone = '$phone' where UserID = '$userid'";

    if ($reql = $db->query($selectuser)) {
        echo "Record updated successfully<br>";
    }
    header("location: manage_user.php");

    


    
    #print_r($oldtypeuse);


?>