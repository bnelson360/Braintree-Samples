
<?php

require_once "lib/Braintree.php";

$result = Braintree_Subscription::create(array(
    'paymentMethodToken' => $_POST['token'],
    'planId' => $_POST['plan']
));

if ($result->success) {
   echo'Subscription added!';
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
