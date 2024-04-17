<!--
This page represents your cart/basket overview, before checkout.
-->
<?php

require_once 'init.php';

?>

<html>
<head>
    <title>Cart</title>
</head>
<body>
    <p>Total: £14.00</p>
    <ul>
        <li>T-shirt: £10</li>
        <li>Socks (x2): £4</li>
    </ul>
    <?= preCheckoutRewards(); ?>
</body>
</html>
