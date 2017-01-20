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
    
    public function verifyTransaction($transaction_reference){
        //https://api.paystack.co/transaction/verify/:reference
        $url = "https://api.paystack.co/transaction/verify/".$transaction_reference;
        
        $headers = [
            "Authorization: Bearer {$this->secret_key}",
            'Content-Type: application/json'
        ];
        
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        
        //Modify this two lines to suit your needs
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        return json_decode($response);
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
}