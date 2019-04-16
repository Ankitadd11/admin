<?php 
/**
     * Event Managment
     *
     * @ModelName : Event
     * @CreatedBy : Ankita Solace
     * @CreateDate : 11-04-2019
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Model {

   function __construct(){
      parent::__construct();
       $this->EventTbl = 'provider-event-types';
    }

    // get all the evetns data
    public function listData() {
        $SqlQuery = "
            SELECT * FROM (
            SELECT E.*, EJ.event_title ParentEvent 
            FROM `".$this->EventTbl."` E  
            INNER JOIN
                `".$this->EventTbl."` EJ
            ON
                EJ.event_id = E.event_parent_id
            WHERE E.event_parent_id <> 0
            UNION ALL 
            SELECT ET.*, '' ParentEvent
            FROM `".$this->EventTbl."` ET  
            WHERE ET.event_parent_id = 0) temp 
            ORDER BY event_id,event_parent_id,`order`;";
         return  $this->db->query($SqlQuery)->result_array();
    }

    // get the list of active parent event list for drop down
    public function getParentActiveEvets() {
         return $this->db->where("status", 1)->where("event_parent_id", 0)->get($this->EventTbl)->result_array(); 
    }

    // insert events into database
    public function insert($data, $filePath) {
        $PostData = $this->getTransactionDetails();
        $PostData["image_path"] = $filePath;
        $PostData["Status"] = isset($data["Status"]) ? 1 : 0;  unset($data["Status"]);  
        $data = array_merge($PostData, $data);
        $this->db->insert($this->EventTbl, $data);
    }

    // select single row value of service
    public function Select( $id ) {
        return $this->db->where("event_id", $id)->get($this->EventTbl)->result_array()[0]; 
    }

    // update records in database 
    public function update( $filePath, $data ) {
        $data["Status"] = isset($data["Status"]) ? 1 : 0;
        $data["updatedat"] = date("Y-m-d H:i:s");
        if(!empty($filePath))  $data["image_path"] = $filePath;

         $this->db->where('event_id', $data["event_id"]);
         $this->db->update($this->EventTbl, $data);
    }


     // update status of service in database
    public function UpdateStatus( $id, $status ) {
        $this->db->set('status',$status,false)->where('event_id', $id)->update($this->EventTbl);
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