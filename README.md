# Paystack PHP Library for CodeIgniter
PHP implementation of some of the features of Paystack's API targeted at CodeIgniter users but can be used by any PHP developer.


# Requirements
- PHP >= 5.4
- CodeIgniter 3.\*.\*


# Getting Started
Copy file **Paystack.php** to your **application/libraries** directory and load it from your controller:

_`$this->load->library('paystack', ['secret_key'=>YOUR_SECRET_KEY, 'public_key'=>YOUR_PUBLIC_KEY]);`_

# Features
- Transaction Initialisation:

 To initialise a transaction, call _`init()`_ as shown below:
 
 _`$auth_url = $this->paystack->init($ref, $amount_in_kobo, $email, $metadata_arr, $callback_url, $return_array)`_
  - $ref {string}: Transaction Reference (Required)
  - $amount_in_kobo {int}: Amount in kobo (Required)
  - $email {string}: Customer's Email Address (Required)
  - $metadata_arr {Array}: An array of metadata (Optional)
  - $callback_url {string}: Callback URL (Optional)
  - $return_array {boolean}: Whether the method should return the whole array or just the **authorization_url**. Authorization URL will be returned by default (Optional)
  


- Plan Subscription:

 To subscribe user to a predefined subscription, call _`initSubscription()`_ as shown below:
 
 _`$auth_url = $this->paystack->initSubscription($amount_in_kobo, $email, $plan, $metadata_arr, $callback_url, $return_array)`_
  - $amount_in_kobo {int}: Amount in kobo (Required)
  - $email {string}: Customer's Email Address (Required)
  - $plan {string}: Plan to subscribe user to (Required)
  - $metadata_arr {Array}: An array of metadata (Optional)
  - $callback_url {string}: Callback URL (Optional)
  - $return_array {boolean}: Whether the method should return the whole array or just the **authorization_url**. Authorization URL will be returned by default (Optional)


- Transaction Verification:

 To verify a transaction, call the _`verifyTransaction()`_ as shown below:
 
 _`$ver_info = $this->paystack->verifyTransaction($transaction_ref);`_

 An array of the transaction information will be returned to you.
 
 
# Note:
This library is a work in progress and far from done.
