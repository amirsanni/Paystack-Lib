<?php
defined('BASEPATH') OR exit('Access Denied');//comment this line if not using with CodeIgniter

/**
 * Description of Paystack
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 24-Oct-2016
 */
class Paystack {
    protected $secret_key;

    public function __construct($data) {
        $this->secret_key = $data['key'];
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
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        
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
}
