<?php
session_start();
require("dbConn.php");
if (!$_SESSION['login']) {
    header("location: /myphp/index.php");
    exit;
}else{
    $typeid = $_POST["typeid"];
    $Name = $_POST["Name"];
    $TypeNumber = $_POST["TypeNumber"];
    $current_number = $_POST["current_number"];
    $current_year = $_POST["current_year"];
    
    if($typeid!=""){
        
        $ckuser = "select Name from type where Name = '".$Name."'";
        $result = $db->query($ckuser);
        $row = $result->fetch_assoc();
        // if($row["Name"]!=$Name){
            // if($row["password"]!=$password){
            //   $password = md5($password);  
            // }
            
            $inertcode = "update type set 
            Name = '".$Name."',
            TypeNumber = '".$TypeNumber."',
            current_number = '".$current_number."',
            current_year = '".$current_year."'
            where TypeID = '".$typeid."'
            ";
            if ($db->query($inertcode)==TRUE) {
                echo "<script>";
                echo "alert('แก้ไขบัญชีผู้ใช้งานเรียบร้อยแล้ว');"; 
                echo "window.location.href = 'Booktype.php';";
                echo "</script>";
            }else{
                echo "<script>";
                echo "alert('ผิดพลาด');"; 
                echo "window.history.back()";
                echo "</script>";
            }

        }else{
           echo "<script>";
            echo "alert('มีชื่อผู้ใช้งานนี้ในระบบแล้ว');"; 
            echo "window.history.back()";
            echo "</script>";

        }
    // }else{
    //     header("location: Documenttype.php");
    // }
    
} ?>