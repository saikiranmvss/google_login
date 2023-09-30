
<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('70762236552-k2pig9usj83m22h8qs7mj8f3l0qiibu0.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/tests/composer/login.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

// Skip SSL certificate checks
$context = stream_context_create([
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false,
    ],
]);

// Apply the context to the Google Client
$google_client->setHttpClient(new GuzzleHttp\Client(['verify' => false, 'stream_context' => $context]));

?>
