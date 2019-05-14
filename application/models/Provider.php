<?php 
/**
     * Provider Managment
     *
     * @ModelName : Provider
     * @CreatedBy : Ankita Solace
     * @CreateDate : 19-04-2019
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provider extends CI_Model{

   function __construct(){
      parent::__construct();
       $this->ProviderTbl = 'provider-register';
       $this->ProviderBusinessTbl = '`provider-details`';
       $this->ProviderProfileTbl = "`provider-profile-content-url`";
       $this->ProviderCategoryTbl = "`provider-profile-category`";
       $this->ServiceTypeTbl = "`provider-service-types`";
       $this->EventTypeTbl = "`provider-event-types`";
       $this->CategoryTbl ="`provider-categories`";       
    }

    public function listData() {
    	return $this->db->get($this->ProviderTbl)->result_array();
    }

      // select single row value of service
    public function Select( $id ) {
    	$data["BusinessDetails"] = $this->db->where("provider_id", $id)->get($this->ProviderBusinessTbl)->result_array();
    	$data["ProfileDetails"] = $this->db->where("provider_id", $id)->get($this->ProviderProfileTbl)->result_array();
    	$data["ServiceType"] = $this->getServiceType( $id );
    	$data["EventType"] = $this->getEvents($id);
    	$data["Categories"] = $this->getCategories($id);
    	return $data;
    }

    // serice type of selected provider 
    public function getServiceType( $providerID  ) {
    	$SqlQuery = "SELECT S.service_type_title,S.image_path FROM ".$this->ProviderCategoryTbl. " C INNER JOIN ".$this->ServiceTypeTbl." S ON C.service_type_id = S.service_type_id WHERE provider_id = ".$providerID.";";
    	$query =  $this->db->query($SqlQuery)->result_array();   

       return $query;
    }

    // get the categoires name for provider 
    public function getCategories( $providerID ) {
    	$SqlQuery = "SELECT category_title FROM ".$this->CategoryTbl." WHERE FIND_IN_SET(category_id, ( SELECT category_id FROM ".$this->ProviderCategoryTbl." WHERE provider_id = ".$providerID."));";
    	$query =  $this->db->query($SqlQuery)->result_array();   

       return $query;
    }

      // get the event name for provider 
    public function getEvents( $providerID ) {
    	$SqlQuery = "SELECT event_title FROM ".$this->EventTypeTbl." WHERE FIND_IN_SET(event_id , ( SELECT event_id FROM ".$this->ProviderCategoryTbl." WHERE provider_id = ".$providerID."));";
    	$query =  $this->db->query($SqlQuery)->result_array();  
       return $query;
    }

 

 }