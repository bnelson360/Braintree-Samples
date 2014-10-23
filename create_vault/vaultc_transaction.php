<?php

require_once "lib/Braintree.php";


$result = Braintree_Customer::create(array(
    'firstName' => $_POST["first_name"],
    'lastName' => $_POST["last_name"],
    'company' => 'Nelson Co.',
    'paymentMethodNonce' => 'nonce-from-the-client'
));

if ($result->success) {
    echo 'Customer ID: '.($result->customer->id);
    echo  '<br>Token: '.($result->customer->creditCards[0]->token);
    echo "<h2>Result:</h2><br> <pre>";
    var_dump($result);
    echo "</pre>";
} else {
    foreach($result->errors->deepAll() AS $error) {
        echo($error->code . ": " . $error->message . "\n");
        echo "<h2>Result:</h2><br> <pre>";
        var_dump($result);
        echo "</pre>";
    }
}
