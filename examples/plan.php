<?php
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$paystack = new Paystack([
    'secret_key'=>'sk_test_58caf76164c50ae6c7ff9c89a2369d67b74bea3a'
]);


$created = $paystack->plan->create([
    'name'=>"Plan A",
    'amount'=>20000,
    'interval'=>'monthly',
    'description'=>'bla bla bla',
    'send_invoices'=>TRUE,
    'send_sms'=>TRUE,
    'currency'=>'NGN',
    'invoice_limit'=>0
]);


$one = $paystack->plan->getOne(23);

$many = $paystack->plan->getMany();

$updated = $paystack->plan->update(23, [
    'name'=>"Plan Az",
    'amount'=>12000,
    'interval'=>'weekly',
    'description'=>'bla bla bla',
    'send_invoices'=>FALSE,
    'send_sms'=>TRUE,
    'currency'=>'NGN',
    'invoice_limit'=>0
]);