# Paystack Library
 A PHP library for communicating with Paystack API


# Requirements
- PHP >= 5.4


# Getting Started

## Installation
```
composer require amirsanni/paystack-lib
```

# Features
###


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
$paystack->transaction->per_page = 25;//set number of items to return
$paystack->transaction->page_number = 3;//set page number

$multiple = $paystack->transaction->getMany();
```


### Get transactions based on transaction status (failed, success, abandoned)
```
$paystack->transaction->per_page = 20;//set number of items to return
$paystack->transaction->page_number = 1;//set page number

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
$paystack->transaction->export();//file will be downloaded in csv format
```


### Charge Returning Customers
```
$paystack->transaction->chargeReturningCustomer($auth_code, $amount_in_kobo, $email, $transaction_ref, $metadata_array);
```



# Customer

### Create Customer
```
$created = $paystack->customer->create('foo@bar.com', 'Foo', 'Bar', '0703xxxxxxx', [
    'company'=>"Foo Bar"
]);
```

### Get single customer information
```
$one = $paystack->customer->getOne(96992);
```


### Get multiple customer information
```
$many = $paystack->customer->getMany();
```

#### Check the examples directory for more.