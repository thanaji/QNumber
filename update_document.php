<?php 
    if(isset($_POST['submit']))
    {
        session_start();
        require("dbConn.php");
        
        $sead = $_POST['send'];
        $to = $_POST['to'];
        $story = $_POST['story'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $docid = $_GET["docid"];
        $filename = "...";
        
        $updatedoc = "update document  set  Sent_Name = '$sead',Receive_Name ='$to',Text='$story',Phone = '$phone',Filee='$filename' where DocumentID = '$docid'";

        if ($reql = $db->query($updatedoc)) {
            echo "Record updated successfully<br>";
        }
        header("location: home.php");
    }
?>