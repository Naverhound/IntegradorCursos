<?php 
require 'PayPal-PHP-SDK/autoload.php';
$apiContext= new \PayPal\Rest\ApiContext(
    new\PayPal\Auth\OAuthTokenCredential(
        'Adsc0jRu40gwankYc62p_HkeyGtyuGbl5qriVy6NJKT3hnSaKDvm8l7EugCOPLUu0LUl2DTH2FQBmuqa',//ClientID
        'ENRssCXngV1EkMZhJnbzs6GxbIid8wMMnnBxhtEHh2LtIMrNKFtq4hWIwmcr8KNYhjpFf3CZ5Tuq4f48'//Secret
    )
);

?>