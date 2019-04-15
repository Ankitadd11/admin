<?php 
/**
     * Category Managment
     *
     * @ModelName : Category
     * @CreatedBy : Ankita Solace
     * @CreateDate : 11-04-2019
**/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Model{

   function __construct(){
      parent::__construct();
       $this->CategoryTbl = 'categories';
    }
 }