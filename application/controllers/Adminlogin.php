<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Adminlogin extends MY_Controller{
      function __construct(){
          parent::__construct();
          if(!empty($this->session->userdata("adminid"))){
            return redirect(BASE_URL."dashboard");
          }
          $this->load->model("Login","al");
          $this->load->model("DashboardModel","dm");
      }

      public function index(){
        $data['page']="Admin Login";
        $this->load->view("admin/login",$data);
      }

      public function loginAuth(){

        $output['status']=0;
        $output['msg']="";
        $output['data']=array();

        $email=$this->input->post('email');
        $password=$this->input->post('password');

        if($this->form_validation->run("adminlogin")){
					if($this-> getBrowerInfo($this->logindetails->get_ip()) || ($_SERVER['SERVER_NAME']=="localhost")){
						$res = $this->al->adminAuth("adminlogin",array("email"=>$email));
						if(!empty($res['admin_id'])){
							if($res['password']==$password){

								$data=array("LastLoginDate"=>$this->data['date'],"LastLoginTime"=>$this->data['time']);
								$res1=$this->dm->updateWhere("adminlogin",$data,array("admin_id"=>$res['admin_id']));
								if($_SERVER['SERVER_NAME']!="localhost" && $_SERVER['SERVER_NAME']!="127.0.0.1" && $_SERVER['SERVER_NAME']!="::1"){
									$logindetails=$this->getLoginDetails($res['admin_id']);
									$res1=$this->dm->insertData("logindetails",$logindetails);
							  }

								if($res1){
									$this->session->set_userdata(["adminid"=>$res['admin_id'],"email"=>$res['email']]);
									$this->session->set_flashdata("success","Login successfull.");

									$output['status']=2;  // If i send 1 the  open browser not support
									$output['msg']="Login successfull.";
								}else{
									$output['msg']="Login failed";  
								}
							}else{
								$output['msg']="Password wrong";
							}
						}else{
							$output['msg']="Email wrong.";
						}
					}else{
						$output['status']=1;
						$output['msg']="Try disabling ad blockers and other extensions, enabling javascript, or using a different web browser..";
					}
        }else{
          $output['msg']=strip_tags(validation_errors());
        }
        echo json_encode([$output],JSON_UNESCAPED_SLASHES);
      }

  }
  
?>
