<?php
defined('BASEPATH') OR exit("Access Denied");//comment this line if not using with CodeIgniter

/**
 * Description of Test
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 20-Dec-2016
 */
class Test extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
		$this->load->library('paystack', ['secret_key'=>'YOUR_SECRET_KEY', 'public_key'=>'YOUR_PUBLIC_KEY']);
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    
    public function verify($ref){
        $verInfo = $this->paystack->verifyTransaction($ref);
    }
    
    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
}
