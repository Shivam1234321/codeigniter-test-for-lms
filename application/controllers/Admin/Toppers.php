<?php 
  defined("BASEPATH") OR exit("No direct script access allowed.");

  class Toppers extends MY_Controller{

  	function __construct(){
  		parent::__construct();
  		if(empty($this->session->userdata("adminid"))){
           return redirect(BASE_URL."adminlogin");
        }
        $this->adminid=$this->session->userdata("adminid");
        $this->load->model("DashboardModel","dm");
  	}

  	public function index(){
	  $data['page']="Manage Toppers";
	  $data['category']=$this->dm->getAllDataWhere("category",array("status"=>'1'),"category_id","ASC");
	  $data['toppers']=$this->dm->getAllDataASC("topper","topper_id","DESC");
	  $this->load->view("admin/manage-toppers",$data);
	}

	public function addTopper(){

		$output['status']=0;
		$output['msg']="";
		$output['data']=array();

		$value=$this->input->post();
		$image=md5($_FILES['image']['name']).rand(1000,9999).".".pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

		$config['upload_path'] = "./uploads/topper/";
		$config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG|webp';
		$config['max_size']="2048";
		$config['overwrite']=FALSE;
		$config['file_name']=$image;

		$submit=$this->input->post("submit");

		$this->upload->initialize($config);
		
		if($this->form_validation->run("topper")){
			$data=array("category"=>$value['category'],"name"=>$value['name'],"image_url"=>"uploads/topper/","description"=>$value['description']);
			if($submit=="addTopper"){
				if($this->upload->do_upload("image")){
					$data['image']=$image;
					$data['status']=1;
					$data['date']=$this->data['date'];
					$data['time']=$this->data['time'];
					$res=$this->dm->insertData("topper",$data);
					if($res){
						$output['status']=1;
						$output['msg']="Topper added";
					}else{
						$output['msg']="Topper not found.";
					}
				}else{
					$output['msg']=strip_tags($this->upload->display_errors());
				}
			}else{
				if(!empty($_FILES['image']['name'])){
					if($this->upload->do_upload("image")){
						$data['image']=$image;
						if(file_exists($config['upload_path'].$this->input->post('oimg'))){
						   unlink($config['upload_path'].$this->input->post('oimg'));
						}
					}else{
						$output['msg']=strip_tags($this->upload->display_errors());
						echo json_encode([$output],JSON_UNESCAPED_SLASHES);
						die();
					}
				}	
				$topper_id=$this->input->post("topper_id");
				$res=$this->dm->updateWhere("topper",$data,array("topper_id"=>$topper_id));
				if($res){
					$output['status']=1;
					$output['msg']="Topper updated.";
				}else{
					$output['msg']="Topper not updated.";
				}
				
			}
		}else{
			$output['msg']=strip_tags(validation_errors());
		}
		echo json_encode([$output],JSON_UNESCAPED_SLASHES);

	}




  }
 ?>
