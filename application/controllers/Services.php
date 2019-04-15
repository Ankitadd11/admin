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
    public function list() {
        $data = array();

        $data["ServiceData"] = json_encode( $this->Service->listData() );
        $this->template->load('template','services/index',$data);
        $this->load->view("templates/datatable_js_scripts");
        
    }

    // add service type
    public function add() {
        $data = array();
        if($this->input->method() == "post") {
            $filePath = $this->uploadImageInPortal( $_FILES );
            $this->Service->insert($filePath,$this->input->post() );
        } else {
            $this->template->load('template','services/add',$data);  
        }   
         
    }

    public function edit( $id = null) {
        print_r($id);exit();
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
        }
    }

}
