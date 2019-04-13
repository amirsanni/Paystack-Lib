<?php
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$obj = new Paystack([
    'secret_key'=>'YOUR_PAYSTACK_SECRET_KEY'
]);

$verified = $obj->transaction->verify($_GET['trxref']);

print_r($verified);