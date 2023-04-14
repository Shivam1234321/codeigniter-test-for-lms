<?php
  defined("BASEPATH") OR exit("No direct script access allowed.");

  class Errors extends CI_Controller{
  	function __construct(){
  		parent::__construct();
  	}

  	public function index(){
  		$data['page']="404 Error";
  		$this->load->view("404Error");
  	}
  }

?>