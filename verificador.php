<?php


include "global/config.php";

$login=curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($login, CURLOPT_USERPWD, clienteIDPayPal.":".SecretPayPal);
curl_setopt($login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$result=json_decode(curl_exec($login));
print_r($result->access_token);
?>