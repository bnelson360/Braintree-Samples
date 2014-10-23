<?php
session_start();
require_once "lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/css" src="css/bootstrap.min.css"></script>
</head>
<body>
<form id="merchant-form" action="paypal_transaction.php" method="post">

<input type="hidden" name="payment_method_nonce" id="payment-method-nonce"  />

  Amount:  <input type="text" name="amount" id="amount" />
    <div id="paypal-container"></div>
    <input type="submit" class="btn btn-large" value="Submit" />
</form>
<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "paypal", {
        container: "paypal-container",  // to specify DOM elements, use an ID, a DOM node, or a jQuery element
        paymentMethodNonceInputField: "payment-method-nonce"
    });
</script>
</body>
</html>