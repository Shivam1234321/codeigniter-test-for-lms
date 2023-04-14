<?php
  defined("BASEPATH") OR exit("No direct access allowed.");

  class Home extends MY_Controller{
	  function __construct()
	  {
		  parent::__construct();
	  }

	  public function index(){
		  $data['page']="Home";
		  $data['categories'] = $this->db->select('name, category_id')->where(array('status' => 1))->get('category')->result_array();
		  $this->load->view("index",$data);
	  }

	  public function getTopper($id){
		return $this->db->select('*')->where(['status' => 1, 'category' => $id])->get('topper')->result_array();
	  }

	  public function contactus(){
		  echo "COntact Us";
	  }

	  public function privacyPolicy(){
		echo "Privacy Polict";
	  }

	  public function termCondition(){
		echo "Term and condition";
	  }
  }
?>
