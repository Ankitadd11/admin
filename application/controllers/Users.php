
<?php

/***
	Controller : UsersController
	CreatedBy : Ankita
	CreatedDate : 11-04-2019
***/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();     
		$this->load->helper(array('url','html','form'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('User');		
	}

	// user login page
	public function index() {
		if( isset( $this->session->userdata['logged_in'] ) ) {	redirect('Welcome'); }
		$this->load->view('users/login', $this->loadHeaderFooter());
	}

	// after click on login	
	public function login() {
		if($this->input->method() == 'post') {
		 	$this->signIn();
		 } 
	}	  

	// check login credentails correct or not
	public function signIn() {
		$UserName = trim( $this->input->post( 'Name' ) );
		$Password = md5( trim( $this->input->post( 'password' ) ) );	

		$config = $this->User->GetTheValidationFields();
		$this->form_validation->set_rules($config);

		if( $this->form_validation->run() == false ) {	
			$this->template->load('template','users/login');
		} else {
			$result = $this->User->processLogin( $UserName, $Password );			 
			if( $result ) {							
				$this->SessionData(  $UserName, $Password );				
			} else {
				$data = array('error_message' => 'Invalid Username or Password',"class" => "text-danger");
				$data = array_merge($data, $this->loadHeaderFooter());
				$this->load->view('users/login', $data);
			}
		}
	}

	// successful login set session data
	public function SessionData( $UserName, $Password ) {	
		$whereCondition = array( 'Name' => $UserName,'password'=> $Password, 'Status'=> 1);
		$UserData = $this->SelectQuery($this->User->userTbl, '*', $whereCondition);	    
		if( $UserData ) {
			$SessionData = array(
				'ID' => $UserData[0]->ID,
				'UserName' => $UserData[0]->Name,
				'Email' => $UserData[0]->Email
			);
		}
		$this->session->set_userdata('logged_in', $SessionData);
		redirect('Welcome');
	}


	// Select statemtnt with feilds, wherecondition and limit	
	  public function SelectQuery($table, $fields, $whereCondition = null, $limit = null, $orderBy = null ) {
			$this->db->select( $fields );
			$this->db->from( $table );
			if( !empty( $whereCondition ) ) $this->db->where( $whereCondition );  
			if( !empty( $orderBy ) ) $this->db->order_by($orderBy['field'], $orderBy['Type']);  
			if( !empty( $limit ) )  $this->db->limit($limit);   
			$query = $this->db->get();
			$query = $query->result();
			return $query;
	}
	
	// session logout
	public function logout() {
		if( isset( $this->session->userdata['logged_in'] )) {
			$this->session->sess_destroy();
			redirect("users");
		}
	}

	// change password check password and confirm correct or not if correct set the password
	public function ChangePassword() {
		$data = array();
		if( $this->input->method() == 'post') {
			$Password = $this->input->post()['Password'];
			$ConfirmPassword = $this->input->post()['ConfirmPassword'];	
			if( $Password == $ConfirmPassword ) {
				$flag = $this->User->UpdatePassword( $Password, $_SESSION["Email"], $_SESSION["UserName"] );
			
				unset($_SESSION["UserName"]);
				unset($_SESSION["Email"]);
				redirect('users');
			} else {
				$data = array('error_message' => 'Password and confirm password does not match.',"class" => "text-danger");
			}
		}

		$data = array_merge($data, $this->loadHeaderFooter());
		$this->load->view('users/change_password', $data);
	}

	// redirect to reset password 
	public function ResetPassword() {
		$data = array();
		if( $this->input->method() == 'post') {
			$Email = $this->input->post()["Email"];
			$UserName = $this->input->post()["UserName"];
		
			$ReturnCount = $this->MatchEmailUserData($Email, $UserName);
			if($ReturnCount->Cnt == 0) {
				$data = array('error_message' => 'User Name and Email does not match',"class" => "text-danger");
			} 
			else {
				$_SESSION["Email"] = $Email;
				$_SESSION["UserName"] = $UserName;
				redirect("users/ChangePassword");
			}		
		}

		$data = array_merge($data, $this->loadHeaderFooter());
		$this->load->view('users/reset', $data);
	}

	// check username and email combination
	public function MatchEmailUserData( $Email, $UserName ) {
		$fields = array( "Count(ID) Cnt" );
		$whereCondition = array(
			"Email" => $Email,
			"LOWER(Name)" => strtolower( $UserName ),
			"Status" => 1 
		);
		$result = $this->SelectQuery($this->User->userTbl, $fields, $whereCondition, 1);
		
		return $result[0];
	}

	// load header and footer for each view page under user
	public function loadHeaderFooter() {
		$data["header"] = $this->load->view('templates/header',"",TRUE);
		$data["footer"] = $this->load->view('templates/footer',"",TRUE);

		return $data;
	}
	
}
