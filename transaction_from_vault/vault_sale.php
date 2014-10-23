<?php
require_once "lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
</head>

<h1>Sale from Vault </h1>
<body>
<form id="checkout" action="vaults_transaction.php" method="post" >
   <label>Amount</label> <input name="amount">
   <label>Token</label> <input name="customer_id">
    <input type="submit" id="submit" class="btn btn-large" value="Pay">
</form>

<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "custom", {
        id: "checkout"
    });
</script>
</body>
</html>
