<?php 
/**
     * Category Managment
     *
     * @ModelName : Category
     * @CreatedBy : Ankita Solace
     * @CreateDate : 11-04-2019
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Model{

   function __construct(){
      parent::__construct();
       $this->CategoryTbl = 'provider-categories';
       $this->ServiceTbl = 'provider-service-types';
       
    }


    // get category list data
	public function listData() {
		  $SqlQuery = "SELECT * FROM (
		  		SELECT P.*,C.category_title ParentCategory,  SP.service_type_title 
		  		FROM `".$this->CategoryTbl."` P 
		  		INNER JOIN `".$this->CategoryTbl."`  C 
		  		ON P.parent_category_id = C. category_id
		  		INNER JOIN `".$this->ServiceTbl."` SP 
		  		ON SP.service_type_id = P.service_type_id
		  		WHERE P.parent_category_id != 0
		  		UNION ALL 
		  		SELECT PP.*, '' ParentCategory, SPP.service_type_title 
		  		FROM  `".$this->CategoryTbl."`  PP 
		  		INNER JOIN `".$this->ServiceTbl."` SPP
		  		ON SPP.service_type_id = PP.service_type_id
		  		WHERE PP.parent_category_id  = 0 ) temp 
		  		ORDER BY parent_category_id;";
        return  $this->db->query($SqlQuery)->result_array();
	}    

	// get the actice categories 
	public function activeCategories() {
		 return $this->db->select("category_id,category_title,service_type_id, parent_category_id")->where("status", 1)->get($this->CategoryTbl)->result_array(); 
	}

	// insert category
	public function insert( $data ) {
		$this->PostData = $this->getTransactionDetails();
		$this->PostData["Status"] = isset($data["Status"]) ? 1 : 0;  unset($data["Status"]);  
		$data = array_merge($this->PostData, $data);
		$this->db->insert($this->CategoryTbl, $data);
	}

	// get the category data of category id in edit case
	public function Select( $id ) {
		return $this->db->where("category_id", $id)->get($this->CategoryTbl)->result_array()[0]; 
	}

	// update the value in database in edit case
	public function update( $data ) {
		$data["Status"] = isset($data["Status"]) ? 1 : 0; 
		$data["updatedat"] = date("Y-m-d H:i:s"); 
		$this->db->where('category_id', $data["category_id"])->update($this->CategoryTbl, $data);
	}

	//
	// update status of categories in database
    public function UpdateStatus( $id, $status ) {
        $this->db->set('status',$status,false)->where('category_id', $id)->update($this->CategoryTbl);
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