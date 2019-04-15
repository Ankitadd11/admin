<?php
/**
     * Service Managment
     *
     * @ControllerName : Service
     * @CreatedBy : Ankita Solace
     * @CreateDate : 11-04-2019
**/
defined('BASEPATH') OR exit('No direct script access allowed');
include('BaseController.php');
class Services extends BaseController {
	public function __construct() {
        parent::__construct();
        $this->load->model("Service");
    }

    // display the list of services 
    public function index() {
        $data = array();
         $data["action"] = "list";
        $data["ServiceData"] = json_encode( $this->Service->listData() );
        $this->template->load('template','services/index',$data);
        $this->load->view("templates/datatable_js_scripts");
        
    }

    // add service types
    public function add() {
        $data = array();
        $data["action"] = "services/add";
        $data["PageTitle"] = "Add";
        if($this->input->method() == "post") {
            $filePath = $this->uploadImageInPortal( $_FILES );
            $this->Service->insert($filePath,$this->input->post() );
            redirect("services");
        } else {
            $this->template->load('template','services/add',$data);  
        }   
         
    }

    // edit the service types
    public function edit( $id = null) {
        $data["action"] = "services/edit";
        $data["PageTitle"] = "Edit";
        
        if($this->input->method() == "post") {
            $data = $this->input->post();
            $filePath = "";
            if(isset($_FILES["image_path"]["tmp_name"]) && !empty($_FILES["image_path"]["tmp_name"])) {
              $filePath =  $this->uploadImageInPortal( $_FILES );
            }

            $this->Service->update( $filePath,$data );
            redirect("services");
        } else {
            $data["Service"] = $this->Service->Select( $id );
            $this->template->load('template','services/add',$data);  
        }  
    }

    // view the selected service type data
    public function view($id = null) {
        $data["action"] = "services/view";
        $data["PageTitle"] = "View";
         $data["Service"] = $this->Service->Select( $id );
         $this->template->load('template','services/view',$data);  
    }

    // update the status 
    public function StatusUpdate($id = null,  $status = null) {
        $this->Service->UpdateStatus( $id, $status );
        redirect("services");
    }

    // upload the service image
    public function uploadImageInPortal( $fileData ) {

        $config = array();
        $config['upload_path'] = LOCAL_SERVICE_IMAGE_PATH ;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size'] = '1024000';
        $config['max_width'] = '4096';
        $config['max_height'] = '4096';
        $config['overwrite'] = FALSE;
         $this->load->library('upload', $config);
         
        if (!$this->upload->do_upload("image_path")){
             $error = array('error' => $this->upload->display_errors());
             json_encode($error);exit();
        }else{
            return LOCAL_SERVICE_IMAGE_PATH."/".$_FILES["image_path"]["name"];
            print_r($fileData);exit();
        }
    }

}
