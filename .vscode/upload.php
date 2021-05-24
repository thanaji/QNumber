<?php
include "dbConn.php"; // Using database connection file here

if(isset($_POST['submit']))
{		
    $sentname = $_POST['sent'];
    $rename = $_POST['to'];
    $sname = $_POST['sname'];
    $pdfname = 'test.pdf';

    $sql = "UPDATE document SET Sent_Name='$sentname',Receive_Name='$rename',Textt='$sname',PDF='$pdfname' WHERE documentID=8";
    $check = mysqli_query($db, $sql);
    if(!$check)
    {
        echo mysqli_error();
    }
    else
    {
        echo "Records update successfully.";
    }
}

mysqli_close($db); // Close connection