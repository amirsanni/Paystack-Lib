<?php
namespace amirsanni\paystacklib;

class Subaccount extends Master {
    public function __construct($secret_key){
        $this->secret_key = $secret_key;
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

    public function create($data){
        //https://api.paystack.co/subaccount
        $url = 'https://api.paystack.co/subaccount';

        if($data['business_name'] && $data['settlement_bank'] && $data['account_number'] && $data['percentage_charge']){
            $response = json_decode($this->curl($url, TRUE, [
                'business_name'=>$data['business_name'],
                'settlement_bank'=>$data['settlement_bank'],
                'account_number'=>$data['account_number'],
                'percentage_charge'=>$data['percentage_charge'],
                'primary_contact_email'=>$data['email'],
                'primary_contact_name'=>$data['name'],
                'primary_contact_phone'=>$data['phone'],
                'settlement_schedule'=>$data['settlement_schedule'],
                'metadata'=>$data['metadata'] ? json_encode($data['metadata']) : ''
            ]));
            
            return $response ? $response : FALSE;
        }

        return ['status'=>0, 'msg'=>"One or more required fields are empty"];
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

    public function getOne($id_or_slug){
        //https://api.paystack.co/subaccount/:id_or_slug
        $url = "https://api.paystack.co/subaccount/{$id_or_slug}";
        
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

    public function getMany($page_number=1, $per_page=50){
        //https://api.paystack.co/subaccount
        $url = "https://api.paystack.co/subaccount?page={$page_number}&perPage={$per_page}";
        
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

    public function update($id_or_slug, $data){
        //https://api.paystack.co/subaccount/:id_or_slug
        $url = "https://api.paystack.co/subaccount/{$id_or_slug}";

        $response = json_decode($this->curl($url, FALSE, [
            'business_name'=>$data['business_name'],
            'settlement_bank'=>$data['settlement_bank'],
            'account_number'=>$data['account_number'],
            'percentage_charge'=>$data['percentage_charge'],
            'primary_contact_email'=>$data['email'],
            'primary_contact_name'=>$data['name'],
            'primary_contact_phone'=>$data['phone'],
            'settlement_schedule'=>$data['settlement_schedule'],
            'metadata'=>$data['metadata'] ? json_encode($data['metadata']) : ''
        ], TRUE, "PUT"));

        return $response;
    }
}