<?php
session_start();
require_once "lib/Braintree.php";

$none = $_POST['payment_method_nonce'];
$result = Braintree_Transaction::sale(array(
    "amount" => trim($_POST['amount']),
    "paymentMethodNonce" => trim($none),
));

$_SESSION['nonce'] = $none;

if ($result->success) {
    print_r("Success ID: " . $result->transaction->id);
    echo "<h2>Result:</h2><br> <pre>";
    var_dump($result);
    echo "</pre>";
} else {
    print_r("Error Message: " . $result->message);
    echo "<h2>Result:</h2><br> <pre>";
    var_dump($result);
    echo "</pre>";
}