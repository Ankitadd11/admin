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
    }

    public function list() {
        $data = array();
        $this->template->load('template','categories/index',$data);
        $this->load->view("templates/datatable_js_scripts");
    }

}
