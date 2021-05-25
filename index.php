<?php
include('config.php');

$login_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);

        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }
        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }
        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }
        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }
        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
        //ตัวแปรไว้ใช้เช็คการ login
        $_SESSION['login'] = true;
    }
}

if (!isset($_SESSION['access_token'])) {

    $login_button = '<a href="' . $google_client->createAuthUrl() . '"class="view" >Login With Google</a>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบ</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>



    <section id="banner">
        <div class="container">
            <div class="text-banner">
                <img src="img/k1.png" alt="">
                <p>ระบบออกเลขหนังสือราชการ</p>
                <p style="margin-bottom: 60px;">โปรดเข้าสู่ระบบด้วยเเอคเคาท์ Google เท่านั้น</p>

                <?php
                if ($login_button == '') {
                    header('location:ckuser.php');
                } else {
                    echo '<div align="center">' . $login_button . '</div>';
                }
                ?>
            </div>
        </div>
    </section>



    <!-- end client -->


</body>

</html>