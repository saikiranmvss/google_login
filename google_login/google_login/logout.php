<?php

//logout.php

include('config.php');

$accessToken = $_SESSION['access_token']; // Replace with the actual access token
$url = 'https://oauth2.googleapis.com/revoke';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'token=' . $accessToken);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Handle the response as needed
// echo $response;


//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:login.php');

?>