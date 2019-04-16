<?php
/**
     * Category Managment
     *
     * @ControllerName : Category
     * @CreatedBy : Ankita Solace
     * @CreateDate : 11-04-2019
**/
defined('BASEPATH') OR exit('No direct script access allowed');
include('BaseController.php');
class Categories extends BaseController {
	public function __construct() {
        parent::__construct();
        $this->load->model("Category");
        $this->load->model("Service");
    }

    public function index() {
        $data = array();
        $data["action"] = "list";
        $data["CategoryData"] = json_encode( $this->Category->listData() );
        $this->template->load('template','categories/index',$data);
        $this->load->view("templates/datatable_js_scripts");
    }

    // add category 
    public function add() {
        $data = array();
        if($this->input->method() == "post") {
            $this->Category->insert( $this->input->post() );
            redirect("categories");
        } else {
            $data = $this->getCategoryServiceData();
            $data["action"] = "categories/add";
            $data["PageTitle"] = "Add";            
            $this->template->load('template','categories/add',$data);
        }        
    }

    // edit category 
    public function edit( $id = null ) {
        $data = array();
        if($this->input->method() == "post") {
            $this->Category->update( $this->input->post() );
            redirect("categories");
        } else {
            $data = $this->getCategoryServiceData();
            $data["action"] = "categories/edit";
            $data["PageTitle"] = "Edit";
            $data["Category"] = $this->Category->Select( $id );
            $this->template->load('template','categories/add',$data);
        } 
    }

    // edit category 
    public function view( $id = null ) {
        $data = array();
        $data = $this->getCategoryServiceData();
        $data["PageTitle"] = "View";
        $data["Category"] = $this->Category->Select( $id );
        $this->template->load('template','categories/view',$data);
    }

    // update status of categories
    public function StatusUpdate($id=null, $status =null) {
        $this->Category->UpdateStatus( $id, $status );
        redirect("categories");
    }

    // get the active service type and categories data
    public function getCategoryServiceData() {
        $data = array();
        $data["ServiceTypeList"] = json_encode( $this->Service->activeServices() );
        $data["ActiveCategoryList"] = json_encode( $this->Category->activeCategories() );
        return $data;
    }

}
