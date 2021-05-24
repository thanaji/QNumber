<?php

$db = mysqli_connect("localhost","root","","project");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>