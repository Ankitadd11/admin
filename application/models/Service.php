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

    // get all the service type datta
    public function listData() {
       return $this->db->get($this->ServiceTbl)->result_array(); 
    }

    // insert into database
    public function insert($filepath, $data ) {
    	$PostData = $this->getTransactionDetails();
    	$PostData["image_path"] = $filepath;
    	$PostData["Status"] = isset($data["Status"]) ? 1 : 0;  unset($data["Status"]);  
    	$data = array_merge($PostData, $data);
    	$this->db->insert($this->ServiceTbl, $data);
    }

    // select single row value of service
    public function Select( $id ) {
    	return $this->db->where("service_type_id", $id)->get($this->ServiceTbl)->result_array()[0]; 
    }

    // update records in database 
    public function update( $filePath, $data ) {
    	$data["Status"] = isset($data["Status"]) ? 1 : 0;
    	$setDataArr = array( "service_type_title" => $data['service_type_title'],"service_type_description" => $data['service_type_description'],"status" => $data['Status'] , "updatedat" => date("Y-m-d H:i:s") );

    	if(!empty($filePath))  $setDataArr["image_path"] = $filePath;
    	 $this->db->where('service_type_id', $data["service_type_id"]);
         $this->db->update($this->ServiceTbl, $setDataArr);
    }

    public function UpdateStatus( $id, $status ) {
        $this->db->set('status',$status,false)->where('service_type_id', $id)->update($this->ServiceTbl);
    }
 }