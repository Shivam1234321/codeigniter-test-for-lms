<?php 
  defined("BASEPATH") OR exit("No direct script access allowed.");

  class Category extends MY_Controller{

  	function __construct(){
  		parent::__construct();
  		if(empty($this->session->userdata("adminid"))){
           return redirect(BASE_URL."adminlogin");
        }
        $this->adminid=$this->session->userdata("adminid");
        $this->load->model("DashboardModel","dm");
  	}

  	public function index(){
	  $data['page']="Manage Category";
	  $data['category']=$this->dm->getAllDataASC("category","category_id","DESC");
	  $this->load->view("admin/manage-category",$data);
	}

	public function addcategory(){

		$output['status']=0;
		$output['msg']="";
		$output['data']=array();

		$name=$this->input->post("name");
		$description=$this->input->post("description");
		$image=md5($_FILES['image']['name']).rand(1000,9999).".".pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
		$config['upload_path'] = "./uploads/category/";
		$config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG|webp';
		$config['max_size']="2048";
		$config['overwrite']=FALSE;
		$config['file_name']=$image;

		$submit=$this->input->post("submit");

		$this->upload->initialize($config);

		if($this->form_validation->run("category")){
			$data=array("name"=>$name,"image_url"=>"uploads/category/","description"=>$description);
			if($submit=="addCategory"){
				if($this->upload->do_upload("image")){
					$data['image']=$image;
					$data['status']=1;
					$data['date']=$this->data['date'];
					$data['time']=$this->data['time'];
					$res=$this->dm->insertData("category",$data);
					if($res){
						$output['status']=1;
						$output['msg']="Category added";
					}else{
						$output['msg']="Category not found.";
					}
				}else{
					$output['msg']=strip_tags($this->upload->display_errors());
				}
			}else{
				if(!empty($_FILES['image']['name'])){
					if($this->upload->do_upload("image")){
						$data['image']=$image;
						if(!empty($this->input->post('oimg')) && file_exists($config['upload_path'].$this->input->post('oimg'))){
						  unlink($config['upload_path'].$this->input->post('oimg'));
						}
					}else{
						$output['msg']=strip_tags($this->upload->display_errors());
						echo json_encode([$output],JSON_UNESCAPED_SLASHES);
						die();
					}
				}	
				$category_id=$this->input->post("category_id");
				$res=$this->dm->updateWhere("category",$data,array("category_id"=>$category_id));
				if($res){
					$output['status']=1;
					$output['msg']="Category updated.";
				}else{
					$output['msg']="Category not updated.";
				}
				
			}
		}else{
			$output['msg']=strip_tags(validation_errors());
		}
		echo json_encode([$output],JSON_UNESCAPED_SLASHES);

	}




  }
 ?>
