<?php
/**
     * Provider Managment
     *
     * @ControllerName : Providers
     * @CreatedBy : Ankita Solace
     * @CreateDate : 19-04-2019
**/
defined('BASEPATH') OR exit('No direct script access allowed');
include('BaseController.php');

class Providers extends BaseController {
	public function __construct() {
        parent::__construct();
        $this->load->model("Provider");
    }

    // display the list of services 
    public function index() {
        $data = array();
         $data["action"] = "list";
        $data["ProviderData"] = json_encode( $this->Provider->listData() );
        $this->template->load('template','providers/index',$data);
        $this->load->view("templates/datatable_js_scripts");        
    }

    public function view($id = null ) {
        $data["action"] = "providers/view";
        $data["PageTitle"] = "View";
        $ProviderData = $this->Provider->Select( $id );
        $data["BusinessDetails"] =json_encode($ProviderData["BusinessDetails"]) ;
        $data["ProfileDetails"] =json_encode($ProviderData["ProfileDetails"]) ;
        $data["ServiceType"] =json_encode($ProviderData["ServiceType"]) ;
        $data["EventType"] =json_encode($ProviderData["EventType"]) ;
        $data["Categories"] =json_encode($ProviderData["Categories"]) ;
        $this->template->load('template','providers/view',$data);  
    }
}
