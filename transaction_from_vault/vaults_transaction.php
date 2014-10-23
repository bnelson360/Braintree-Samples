<?php

require_once "lib/Braintree.php";

$result = Braintree_Transaction::sale(
    array(
        'paymentMethodToken' => $_POST["customer_id"],
        'amount' => $_POST["amount"]
    )
);


if ($result->success) {
    echo 'Transaction ID: '.($result->transaction->id);
    echo  '<br>Result: '.($result->transaction->status);
    echo "<h2>Return:</h2><br> <pre>";
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
