<?php 
/**
     * Service Managment
     *
     * @ModelName : Service
     * @CreatedBy : Ankita Solace
     * @CreateDate : 11-04-2019
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('Common.php');
class Service extends Common{

   function __construct(){
      parent::__construct();
       $this->ServiceTbl = 'provider-service-types';
    }

    // insert into database
    public function insert($filepath, $data ) {
    	$PostData = $this->getTransactionDetails();
    	$PostData["image_path"] = $filepath;
    	$PostData["Status"] = isset($data["Status"]) ? 1 : 0;  unset($data["Status"]);  
    	$data = array_merge($PostData, $data);
    	$this->db->insert($this->ServiceTbl, $data);
    }
 }