# Paystack
PHP implementation of some of the features of Paystack's API targeted at CodeIgniter users but can be used by any PHP developer.


# Requirements
- PHP >= 5.4
- CodeIgniter 3.\*.\*


# Getting Started
Copy file **Paystack.php** to your **application/libraries** directory and load it from any of your controllers as:

_`$this->load->library('paystack', ['secret_key'=>YOUR_SECRET_KEY, 'public_key'=>YOUR_PUBLIC_KEY]);`_

# Features
- Transaction Verification
 To verify a transaction, call the _`verifyTransaction()`_ as shown below:
 
 _`$trans_info = $this->paystack->verifyTransaction($transaction_ref);`_

 An array of the transaction information will be returned to you.
