


<?php
require_once '../../vendor/autoload.php';
\Payjp\Payjp::setApiKey('sk_live_e8024dc9f4c17ef186b09e54b775cd27868693f29eed8bd4ecc74d85');
$charge =\Payjp\Charge::create(array(
    'card' => 'token_id_by_Checkout_or_payjp-js',
    'amount' => htmlentities($_POST['amount']),
    'currency' => 'jpy'
));