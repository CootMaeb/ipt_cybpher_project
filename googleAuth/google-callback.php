<?php
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

session_start();

$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);  
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT']);
$client->addScope('email');
$client->addScope('profile');

if(isset($_GET['code'])) {
    // This works with older versions
    $token = $client->authenticate($_GET['code']);
    
    if($token && !isset($token['error'])) {
        $client->setAccessToken($token);

        $oauth2 = new Google_Service_Oauth2($client);
        $userInfo = $oauth2->userinfo->get();

        $_SESSION['user_type'] = 'google';
        $_SESSION['user_name'] = $userInfo->name;
        $_SESSION['user_email'] = $userInfo->email;
        $_SESSION['user_image'] = $userInfo->picture;

        header('Location: ../for_user/user_index.php');
        exit();
    } else {
        $_SESSION['error'] = 'Login failed: ' . ($token['error'] ?? 'Unknown error');
        header('Location: ../login.php');
        exit();
    }
} else {
    $_SESSION['error'] = 'No authorization code received';
    header('Location: ../login.php');
    exit();
}