<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Model{

   function __construct(){
      parent::__construct();
    }

        // set the rules for the complusory fields
        public function GetTheValidationFields() {
            $config = array(
                array(
                        'field' => 'Name',
                        'label' => 'Name',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'You must provide a %s.',
                        ),
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'You must provide a %s.',
                        ),
                )
            );
            
            return $config;
        }

    public function getTransactionDetails() {
        $TrasactionArray = array();
        $TrasactionArray['createdat'] = date("Y-m-d H:i:s");   
        $TrasactionArray['updatedat'] = date("Y-m-d H:i:s");  
        $TrasactionArray['createdby'] = $this->session->userdata['logged_in']['ID'];
        $TrasactionArray['updatedby'] = $this->session->userdata['logged_in']['ID'];
        return $TrasactionArray;
    }
 
    
}