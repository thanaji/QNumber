<?php
include "dbConn.php"; // Using database connection file here
session_start();
date_default_timezone_set("Asia/Bangkok");
print_r($_SESSION);
$nameadd = $_SESSION['nameadd'];
if(isset($_POST['submit']))
{	
    if(isset($_POST['type_id']))
    {
        $dropdown = $_POST['type_id'];
    }


    $sead = $_POST['send'];
    $to = $_POST['to'];
    $story = $_POST['story'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];

    $time = date('Y-m-d H:i:s',strtotime($_POST['date']));
    $userid = $_SESSION['AD_userid'];

    $filee = "...";
    #print_r($time);
    #print_r($dropdown);
    
    #echo "$dropdown.'()'.$userid.'()'.$sead.'()'.$to.'()'.story.'()'.$filee";
    $resultNumber = 1;

    $selecttype = "select current_number from type where TypeID = '$dropdown'";
    $reql = $db->query($selecttype);
    $rowtype = $reql->fetch_assoc();
    $resultNumber = $rowtype['current_number'] + 1;
    print_r($resultNumber);
    
    $checky = date('Y')+543; #เช็คปี -----------
    print_r($checky);


    $insert = mysqli_query($db,"INSERT INTO `document`(`TypeID`,`UserID`,`Date`,`resultNumber`,`Sent_Name`,`Receive_Name`,`Text`,`Phone`,`Filee`,`Status`) VALUES ('$dropdown','$userid' ,'$time','$resultNumber','$sead','$to','$story','$phone','$filee','1')");

    $updatetype = "update type  set current_number = '$resultNumber' where TypeID = '$dropdown' AND current_year = '$checky'"; #---------------

    if ($reql = $db->query($updatetype)) {
        echo "Record updated successfully<br>";
    }
    #header("location: manage_user.php");

    


}

mysqli_close($db); // Close connection

?>
