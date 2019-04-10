<?php
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$paystack = new Paystack([
    'secret_key'=>'sk_test_58caf76164c50ae6c7ff9c89a2369d67b74bea3a'
]);


$created = $paystack->customer->create('foo@bar.com', 'Foo', 'Bar', '0703xxxxxxx', [
    'company'=>"Foo Bar"
]);


$one = $paystack->customer->getOne(96992);

$many = $paystack->customer->getMany();

$updated = $paystack->customer->update(96992, 'Amir', 'Sanni');

$whitelisted = $paystack->customer->whitelist('amirsanni@gmail.com');

$blacklisted = $paystack->customer->blacklist('amirsanni@gmail.com');