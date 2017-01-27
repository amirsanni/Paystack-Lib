<?php
defined('BASEPATH') OR exit('Access Denied');//remove this line if not using with CodeIgniter

/**
 * Description of Paystack
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 20-Dec-2016
 */
class Paystack {
    protected $secret_key;
    protected $public_key;

    public function __construct($data) {
        $this->secret_key = $data['secret_key'];
        $this->public_key = $data['public_key'];
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param string $url url to call
     * @param boolean $use_post Whether to use POST as request method or not
     * @param array $post_data an array of post data
     * @return type
     */
    private function curl($url, $use_post, $post_data=[]){
        $curl = curl_init();
        
        $headers = [
            "Authorization: Bearer {$this->secret_key}",
            'Content-Type: application/json'
        ];

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        
        if($use_post){
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        }

        //Modify this two lines to suit your needs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);

        $response = curl_exec($curl);

        curl_close($curl);
        
        return $response;
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param string $ref Transaction Reference
     * @param int $amount_in_kobo Amount to be paid (in kobo)
     * @param string $email Customer's email address
     * @param array $metadata_arr An array of metadata to add to transaction
     * @param string $callback_url URL to call in case you want to overwrite the callback_url set on your paystack dashboard
     * @param boolean $return_array Whether to return the whole array or just the authorisation URL
     * @return boolean
     */
    public function init($ref, $amount_in_kobo, $email, $metadata_arr=[], $callback_url="", $return_array=false){        
        if($ref && $amount_in_kobo && $email){
            //https://api.paystack.co/transaction/initialize
            $url = "https://api.paystack.co/transaction/initialize/";
                
            $post_data = [
                'reference'=>$ref,
                'amount'=>$amount_in_kobo,
                'email'=>$email,
                'metadata'=>json_encode($metadata_arr),
                'callback_url'=>$callback_url
            ];
            
            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            if($response){                
                //return the whole decoded object if $return_array is true, otherwise return just the authorization_url
                return $return_array ? json_decode($response) : json_decode($response)->data->authorization_url;
            }
            
            //api request failed
            return FALSE;
        }
        
        return FALSE;
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param int $amount_in_kobo Amount to be paid (in kobo)
     * @param string $email Customer's email address
     * @param string $plan Plan to subscribe user to
     * @param array $metadata_arr An array of metadata to add to transaction
     * @param string $callback_url URL to call in case you want to overwrite the callback_url set on your paystack dashboard
     * @param boolean $return_array Whether to return the whole array or just the authorisation URL
     */
    public function initSubscription($amount_in_kobo, $email, $plan, $metadata_arr=[], $callback_url="", $return_array=false){        
        if($amount_in_kobo && $email && $plan){
            //https://api.paystack.co/transaction/initialize
            $url = "https://api.paystack.co/transaction/initialize/";
                
            $post_data = [
                'amount'=>$amount_in_kobo,
                'email'=>$email,
                'plan'=>$plan,
                'metadata'=>json_encode($metadata_arr),
                'callback_url'=>$callback_url
            ];

            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            if($response){                
                //return the whole decoded object if $return_array is true, otherwise return just the authorization_url
                return $return_array ? json_decode($response) : json_decode($response)->data->authorization_url;
            }
            
            //api request failed
            return FALSE;
        }
        
        return FALSE;
    }	
	
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    /**
     * 
     * @param type $transaction_reference
     * @return array
     */
    public function verifyTransaction($transaction_reference){
        //https://api.paystack.co/transaction/verify/:reference
        $url = "https://api.paystack.co/transaction/verify/".$transaction_reference;
        
        //curl($url, $use_post, $post_data=[])
        return json_decode($this->curl($url, FALSE));
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    public function chargeReturningCustomer($auth_code, $amount_in_kobo, $email, $ref="", $metadata_arr=[]){
        
        if($auth_code && $amount_in_kobo && $email){
            //https://api.paystack.co/transaction/charge_authorization
            $url = "https://api.paystack.co/transaction/charge_authorization/";
                
            $post_data = [
                'authorization_code'=>$auth_code,
                'amount'=>$amount_in_kobo,
                'email'=>$email,
                'reference'=>$ref,
                'metadata'=>json_encode($metadata_arr)
            ];

            //curl($url, $use_post, $post_data=[])
            $response = $this->curl($url, TRUE, $post_data);
            
            if($response){                
                //return the whole json decoded object 
                return json_decode($response);
            }
            
            //api request failed
            return FALSE;
        }
        
        //required fields are not set
        return FALSE;
    }
}