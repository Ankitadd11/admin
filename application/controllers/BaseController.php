<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

	 public function __construct() {
    	parent::__construct();     
		$this->load->helper(array('url','html','form'));
		$this->load->library('template');
		$this->load->library(array('form_validation','session'));;
		if( !isset( $this->session->userdata['logged_in'] ) && empty( $this->session->userdata['logged_in'] )) {
			redirect(base_url());
		}
    }
	

    // upload the images in folder
      public function uploadImageInPortal( $fileData, $imgFolderPath ) {
        $config = array();
        $config['upload_path'] = $imgFolderPath ;
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
            return $imgFolderPath."/".$_FILES["image_path"]["name"];
        }
    }

	public function index() {
		
	}
		
}
