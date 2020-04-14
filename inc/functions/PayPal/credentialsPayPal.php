<?php 
require __DIR__ .'/../../../PayPal-PHP-SDK/autoload.php';//The __DIR__ magic constant returns the directory of the current file.
define('SITE_URL','http://localhost/integradorcursos');//base URL to concat "/destination url" in other places like RedirectURLS paypal method
$apiContext= new \PayPal\Rest\ApiContext(
    new\PayPal\Auth\OAuthTokenCredential(
        'AevCWJpMcLM3Q-Ear2gJJf6dpQIAxFNGL0J0MGkntw1RZPSGiqVM08LmTAJBUg0IAafUet2c4-_u5E8D',//ClientID
        'EPU0aOhSTLPhFcZ1SV84eHnZ2rOLsbo_ZMcEBo39_1-2i6X0b4vyXhv-wS1z65w7jPejmwQvICpBFQzX'//Secret
    )
);
//var_dump($apiContext);
?>