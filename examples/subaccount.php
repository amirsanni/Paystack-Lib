<?php
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$paystack = new Paystack([
    'secret_key'=>'sk_test_58caf76164c50ae6c7ff9c89a2369d67b74bea3a'
]);


$created = $paystack->subaccount->create([
    'business_name'=>"Company A",
    'settlement_bank'=>"Bank B",
    'account_number'=>1123483201,
    'percentage_charge'=>2.5,
    'primary_contact_email'=>"john.doe@foobar.com",
    'primary_contact_name'=>"John Doe",
    'primary_contact_phone'=>2348027218301,
    'settlement_schedule'=>'weekly',
    'metadata'=>[
        'account_manager'=>"Jane Doe"
    ]
]);


$one = $paystack->subaccount->getOne(23);

$many = $paystack->subaccount->getMany();

$updated = $paystack->subaccount->update(23, [
    'business_name'=>"Company A",
    'settlement_bank'=>"Bank B",
    'account_number'=>1023483201,
    'percentage_charge'=>2.5,
    'primary_contact_email'=>"john.doe@foobar.com",
    'primary_contact_name'=>"John Doe",
    'primary_contact_phone'=>2348027218301,
    'settlement_schedule'=>'weekly',
    'metadata'=>[
        'account_manager'=>"Jane Doe"
    ]
]);