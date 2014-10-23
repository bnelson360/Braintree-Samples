<?php
require_once "lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
</head>

<h1>Basic Dropin </h1>
<body>
<form id="checkout" method="post" action="transaction.php">
    <div id="dropin"></div>
    <input type="submit" value="Pay $10">
</form>
</body>
</html>

<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "dropin", {
        container: 'dropin'
    });
</script>
