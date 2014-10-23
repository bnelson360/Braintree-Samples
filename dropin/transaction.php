
<?php

require_once "lib/Braintree.php";

$result = Braintree_Transaction::sale(array(
    'amount' => '10.00',
    'paymentMethodNonce' => 'nonce-from-the-client'
));

if ($result->success) {
   echo'Valid Transaction!';
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
