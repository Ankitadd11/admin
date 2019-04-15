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
	

	public function index() {
		
	}
		
}
