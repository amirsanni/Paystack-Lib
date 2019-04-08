<?php
namespace amirsanni\paystacklib;


class Master {
    protected $secret_key;
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

    protected function curl($url, $use_post, $post_data=[], $use_custom=FALSE, $custom_type=''){
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

        else if($use_custom){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $custom_type);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_data));
        }
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		
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

    protected function redirect($url){
        header("Location: {$url}");
    }
}