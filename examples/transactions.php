<?php
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$paystack = new Paystack([
    'secret_key'=>'sk_test_58caf76164c50ae6c7ff9c89a2369d67b74bea3a'
]);


//Make transaction. Will redirect to payment page
// $make = $paystack->transaction->make([
//     'ref'=>md5('dsef'),
//     'amount_in_kobo'=>20000,
//     'email'=>'amirsanni@gmail.com',
//     'metadata'=>[
//         'name'=>"Amir Olalekan",
//         'ID'=>"AMS10",
//         "Phone"=>"07045567890"
//     ],
//     'callback_url'=>'http://localhost/paystack-lib/examples/callback.php'
// ]);

// print_r($make);//if there is an error


//Verify transaction
$verified = $paystack->transaction->verify('CP43-EVR1IQNO');


//Get single transaction info
$single = $paystack->transaction->getOne(75749029 );


//Get multiple transactions info
$paystack->transaction->per_page = 2;

$multiple = $paystack->transaction->getMany();
$cust_trans = $paystack->transaction->whereCustomer('96992');
$by_status = $paystack->transaction->whereStatus('status');
$between_dates = $paystack->transaction->betweenDates('2017-01-01', date('Y-m-d'));

//transaction timeline
$timeline = $paystack->transaction->timeline('CP43-EVR1IQNO');

//total of all transaction
$all_time = $paystack->transaction->allTime();

//total transations between dates
$total_between_dates = $paystack->transaction->totalBetweenDates('2019-01-01', date('Y-m-d'));

//export transactions
// $paystack->transaction->export();//will be downloaded


//chargeReturningCustomer($auth_code, $amount_in_kobo, $email, $ref="", $metadata_arr=[])
$paystack->transaction->chargeReturningCustomer($auth_code, $amount_in_kobo, $email, "", $metadata_arr);