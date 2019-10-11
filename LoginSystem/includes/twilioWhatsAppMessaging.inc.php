<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '/vendor/autoload.php'; 

use Twilio\Rest\Client;

$sid    = "AC650d86e24b4d0dcd5e9b4cad1c26a770";
$token  = "97311b09fe3ea2b8c5acf028e99ca07a";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("whatsapp:+5218111774732", // to
                           array(
                               "from" => "whatsapp:+14155238886",
                               "body" => "Your appointment is coming up on July 21 at 3PM"
                           )
                  );

print($message->sid);
