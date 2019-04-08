<?php
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$obj = new Paystack([
    'secret_key'=>'sk_test_58caf76164c50ae6c7ff9c89a2369d67b74bea3a'
]);

$verified = $obj->transaction->verify($_GET['trxref']);

print_r($verified);