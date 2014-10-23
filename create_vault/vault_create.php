<?php
require_once "lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
</head>

<body>

<h1>Add customer to Vault </h1>
<form id="checkout" action="vaultc_transaction.php" method="post" >
    <input name="first_name" value="Bobby">
    <input name="last_name" value="Testerson">
    <input data-braintree-name="number" value="4111111111111111">
    <input data-braintree-name="expiration_date" value="10/20">
    <input type="submit" id="submit" class="btn btn-primary" value="Pay">
</form>

<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "custom", {
        id: "checkout"
    });
</script>
</body>
</html>
