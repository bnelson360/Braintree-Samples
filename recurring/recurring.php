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
<form id="checkout" action="recurring_transaction.php" method="post" >
   <label>Token: <input name="token"></label><br>
   <label>Plan ID: <input name="plan"></label>
    <input type="submit" id="submit" class="btn btn-large" value="Add">
</form>

<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "custom", {
        id: "checkout"
    });
</script>
</body>
</html>
