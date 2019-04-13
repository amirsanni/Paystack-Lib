# Paystack Library
 A PHP library for communicating with Paystack API


# Requirements
- PHP >= 5.4


# Getting Started

## Installation
```
composer require amirsanni/paystack-lib
```


### Initialise the library
```
require 'vendor/autoload.php';
use amirsanni\paystacklib\Paystack;

$paystack = new Paystack([
    'secret_key'=>'YOUR_PAYSTACK_SECRET_KEY'
]);
```


# Transactions
### Make a Transaction
```
$paystack->transaction->make([
    'ref'=>md5('dsef'),
    'amount_in_kobo'=>20000,
    'email'=>'amirsanni@gmail.com',
    'metadata'=>[
        'name'=>"Amir Olalekan",
        'ID'=>"AMS10",
        "Phone"=>"07045567890"
    ],
    'callback_url'=>'http://localhost/paystack-lib/examples/callback.php'
]);
```


### Verify Transaction
```
$paystack->transaction->verify(TRANSACTION_REFERENCE);
```


### Get Single Transaction Details
```
$single = $paystack->transaction->getOne(TRANSACTION_ID);
```


### Get Multiple Transactions Details
```
$paystack->transaction->per_page = 25;
$paystack->transaction->page_number = 2;

$multiple = $paystack->transaction->getMany();
```


### Get Transactions Based on Status (failed, success, abandoned)
```
$paystack->transaction->per_page = 20;
$paystack->transaction->page_number = 1;

$by_status = $paystack->transaction->whereStatus('success');
```


### Get Transactions within a particular period
```
$between_dates = $paystack->transaction->betweenDates($from_date, $to_date);
```


### Get a particular customer's transactions
```
$cust_trans = $paystack->transaction->whereCustomer(CUSTOMER_ID);
```


### Get a transaction timeline
```
$trans_timeline = $paystack->transaction->timeline(TRANSACTION_ID_OR_REFERENCE);
```


### Get total of all transactions done on your account
```
$all_time = $paystack->transaction->allTime();
```


### Get total of all transactions done on your account within a particular period
```
$total_between_dates = $paystack->transaction->totalBetweenDates(FROM_DATE, TO_DATE);
```


### Export Transactions
```
$paystack->transaction->export();//will be downloaded
```


### Charge Returning Customers
```
$paystack->transaction->chargeReturningCustomer($auth_code, $amount_in_kobo, $email, $ref, $metadata_array);
```