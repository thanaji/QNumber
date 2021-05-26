<?php
    include "dbConn.php";
    session_start();
    #print_r($_SESSION);
    $oldtypeuse = $_SESSION['oldtypeuse'];
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
        #print_r($newword);
    }
    $ii = 1;
    $addnewword = ".";
    $lennew = count($newword);
    while($ii < $lennew)
    {
        $addnewword = $addnewword . $newword[$ii].".";
        $ii += 1;
    }
    #echo $addnewword;
    #echo $userid;

    $selectuser = "update permission  set TypeUseID = '$addnewword' where UserID = '$userid'";

    if ($reql = $db->query($selectuser)) {
        echo "Record updated successfully<br>";
    }

    $selectuser = "update user  set Status = '$radi',Name = '$fullname',Surname ='$surname',Email='$email',Phone = '$phone' where UserID = '$userid'";

    if ($reql = $db->query($selectuser)) {
        echo "Record updated successfully<br>";
    }

    


    
    #print_r($oldtypeuse);


?>