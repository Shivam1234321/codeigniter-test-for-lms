<?php
  defined('BASEPATH') OR exit('No direct script access allowd');

  class Dashboard extends MY_Controller{
      function __construct(){
        parent::__construct();
        if(empty($this->session->userdata("adminid"))){
           return redirect(BASE_URL."adminlogin");
        }
        $this->adminid=$this->session->userdata("adminid");
        $this->load->model("DashboardModel","dm");
      }

      public function index(){
        $data['page']="Home";
        $this->load->view("admin/index",$data);
      }

      public function CP(){
        $data['page']="Change Password";
        $this->load->view("admin/change-password",$data);
      }

      public function changePassword(){

        $output['status']=0;
        $output['msg']="";
        $output['data']=array();

        $opass=$this->input->post('opass');
        $cpass=$this->input->post('cpass');
        $npass=$this->input->post('npass');
        
        if($this->form_validation->run("admincp")){
          $res=$this->dm->getSingleData("adminlogin","admin_id",$this->adminid);
          if(!empty($res['admin_id'])){
            if($res['password']==$opass){
              if($npass==$cpass){
                $where=array("admin_id"=>$this->adminid);
                $data=array("password"=>$npass);
                $res=$this->dm->updateWhere("adminlogin",$data,$where);
                if($res){
                  $output['status']=1;
                  $output['msg']="Password changed.";
                }else{
                  $output['msg']="Password not changed.";
                }
              }else{
                $output['msg']="Password doesn't match";
              }
            }else{
              $output['msg']="Your old password wrong.";
            }
          }else{
            $output['msg']="You are wrong user.";
            return redirect(BASE_URL."adminlogout");
          }
        }else{
          $output['msg']=strip_tags(validation_errors());
        }
        echo json_encode([$output],JSON_UNESCAPED_SLASHES);
      }
     
      public function adminlogout(){
        $data=array("LastLogoutDate"=>$this->data['date'],"LastLogoutTime"=>$this->data['time']);
        $res1=$this->dm->updateWhere("adminlogin",$data,array("admin_id"=>$this->session->userdata("adminid")));

        $this->session->unset_userdata("adminid");
        return redirect(BASE_URL.'adminlogin');
     }
  }

?>
