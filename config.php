<?php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Setup the OAuth 2.0 
$google_client->setClientId('469600781897-82lnbql9ra1d02im988bkt30c39i5urf.apps.googleusercontent.com');
$google_client->setClientSecret('L0K2GQVzgbBPFhmfVnGreZve');
$google_client->setRedirectUri('http://localhost/qnumber/index.php');

// to get the email and profile 
$google_client->addScope('email');
$google_client->addScope('profile');

//start session on web page
session_start();

?> 