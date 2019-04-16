<?php
/**
     * Event Managment
     *
     * @ControllerName : Events
     * @CreatedBy : Ankita Solace
     * @CreateDate : 16-04-2019
**/
defined('BASEPATH') OR exit('No direct script access allowed');
include('BaseController.php');

class Events extends BaseController {
	public function __construct() {
        parent::__construct();
        $this->load->model("Event");
    }

    // display the list of services 
    public function index() {
        $data = array();
         $data["action"] = "list";
        $data["EventData"] = json_encode( $this->Event->listData() );
        $this->template->load('template','events/index',$data);
        $this->load->view("templates/datatable_js_scripts");        
    }

    // add event
    public function add() {
        $data = array();
        if($this->input->method() == "post") {
            $filePath = $this->uploadImageInPortal( $_FILES, LOCAL_EVENT_IMAGE_PATH );
            $this->Event->insert( $this->input->post(), $filePath );
            redirect("events");
        } else {
            $data["ParentEvents"] = json_encode( $this->Event->getParentActiveEvets() );
            $data["action"] = "events/add";
            $data["PageTitle"] = "Add";            
            $this->template->load('template','events/add',$data);
        } 
    }

    // edit record
    public function edit( $id= null) {
        $data["action"] = "events/edit";
        $data["PageTitle"] = "Edit";
        
        if($this->input->method() == "post") {
            $data = $this->input->post();
            $filePath = "";
            if(isset($_FILES["image_path"]["tmp_name"]) && !empty($_FILES["image_path"]["tmp_name"])) {
              $filePath =  $this->uploadImageInPortal( $_FILES, LOCAL_EVENT_IMAGE_PATH  );
            }

            $this->Event->update( $filePath, $data );
            redirect("events");
        } else {
            $data["ParentEvents"] = json_encode( $this->Event->getParentActiveEvets() );
            $data["Event"] = $this->Event->Select( $id );
            $this->template->load('template','events/add',$data);  
        } 
    }

    // render view page
    public function view($id = null) {
        $data["action"] = "events/view";
        $data["PageTitle"] = "View";
        $data["ParentEvents"] = json_encode( $this->Event->getParentActiveEvets() );
        $data["Event"] = $this->Event->Select( $id );
        $this->template->load('template','events/view',$data);  
    }

    // update the status 
    public function StatusUpdate($id = null,  $status = null) {
        $this->Event->UpdateStatus( $id, $status );
        redirect("events");
    }
}
