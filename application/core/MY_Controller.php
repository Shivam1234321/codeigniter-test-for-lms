<?php
 defined('BASEPATH') OR exit('No direct script access allowed.');

 class MY_Controller extends CI_Controller{
     var $data;

     function __construct(){
        parent:: __construct();

        date_default_timezone_set("Asia/Kolkata");
        
        $this->data=array(
            'company_name' => '#CITEST.',

            'company_link' => '#',

            'user_type' => '',
    
            'website' => '',

            'app_name' => 'CITEST',

            'app_link' => '',

            'date'=>date("Y-m-d"),

            'time'=>date("h:i:s a"),

            'day'=>date("l"),

            'otp'=>rand(100000,999999),

						'product_cancel' => "Is Product Canceled? "
        );


     }

    public function delete(){
     $id=$this->input->post("id");
     $table=$this->input->post("table");
     $field=$this->input->post("field");
     $row=$this->dm->singleData($table,'*',$field,$id);
    
     $image="";
     if(!empty($row->image)){
       $image=$row->image;
     }

     $loc="./".$row->image_url;

     $res=$this->dm->deleteWhere($table,array($field=>$id));
     if($res){
      if(!empty($image)){
        unlink($loc.$image) or die('failed');
      }
      
      $this->session->set_flashdata("success","Data deleted successfully");
      echo "success";
     }
     else{
      $this->session->set_flashdata("error","Something went wrong. Try again.");
      echo "failed";
     }
   }

   public function status(){
     $id=$this->input->post("id");
     $table=$this->input->post("table");
     $field=$this->input->post("field");
     $row=$this->dm->singleData($table,'status',$field,$id);
     $data['status']=0;
     if($row['status']==1){
       $data['status']=0;
     }
     else{
       $data['status']=1;
     }
     $res=$this->dm->updateWhere($table,$data,array($field=>$id));
     if($res){
      $this->session->set_flashdata("success","Status change successfully");
      echo "success";
     }
     else{
      $this->session->set_flashdata("error","Something went wrong");
      echo "failed";
     }
   }

	 public function userstatus(){
		$id=$this->input->post("id");
		$table=$this->input->post("table");
		$field=$this->input->post("field");
		$row=$this->dm->singleData($table,'block_status',$field,$id);
		$data['block_status']=0;
		if($row['block_status']==1){
			$data['block_status']=0;
		}
		else{
			$data['block_status']=1;
		}
		$res=$this->dm->updateWhere($table,$data,array($field=>$id));
		if($res){
		 $this->session->set_flashdata("success",(empty($data['block_status'])?"Unblock":"Block")." user status");
		 echo "success";
		}
		else{
		 $this->session->set_flashdata("error","Something went wrong");
		 echo "failed";
		}
	}


	 public function ApproveStatus(){
		$id=$this->input->post("id");
		$table=$this->input->post("table");
		$field=$this->input->post("field");
		$row=$this->dm->singleData($table,'approve_status',$field,$id);
		$data['approve_status']=0;
		if($row['approve_status']==1){
			$data['approve_status']=0;
		}
		else{
			$data['approve_status']=1;
		}
		$res=$this->dm->updateWhere($table,$data,array($field=>$id));
		if($res){
		 $this->session->set_flashdata("success","Status change successfully");
		 echo "success";
		}
		else{
		 $this->session->set_flashdata("error","Something went wrong");
		 echo "failed";
		}
	}

   public function getSubcategory(){
     $output['status']=0;
     $output['msg']="";
     $output['data']=array();

     $value=$this->input->post("value");
     
     $res=$this->dm->getAllDataWhere("subcategory",array("category"=>$value),"subcategory_id","ASC");
     if(count($res)){
       foreach($res as $val):
        $output['status']=1;
        $output['msg']="Subcategory found.";
        $output['data'][]=array("subcategoryid"=>$val['subcategory_id'],"subcategory"=>$val['name']);
       endforeach;
     }else{
      $output['msg']="Subcategory found.";
     }
     echo json_encode([$output],JSON_UNESCAPED_SLASHES);

   }


  public function getLoginDetails($loginid,$type="admin"){
     //$this->load->library('LoginDetails');
    $ip = $this->logindetails->get_ip();
    $mac = $this->logindetails->get_mac();
    $os = $this->agent->platform();
    $Version = $this->agent->version();
    $useragent = $this->agent->browser();
    $username = $this->logindetails->get_username();
  
    $PublicIP = $_SERVER['REMOTE_ADDR'];

    //Uses ipinfo.io to get the location of the IP Address, you can use another site but it will probably have a different implementation
   // $json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://ipinfo.io/$PublicIP/geo",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response = curl_exec($curl);

	curl_close($curl);
	
    $json     = json_decode($response, true);


    $country  = (empty($json['country']))?" ":$json['country'];
    $district   = (empty($json['region']))?" ":$json['region'];
    $city     = (empty($json['city']))?" ":$json['city'];
    $loc     = (empty($json['loc']))?" ":$json['loc'];
    $pincode     = (empty($json['postal']))?" ":$json['postal'];
    $serviceProvider     = (empty($json['org']))?" ":$json['org'];
    $hostname     = (empty($json['hostname']))?"0":$json['hostname'];

    $logindetails_data = array(
        "LoginID" => $loginid,
        "LoginType" => $type,
        "IP" => $ip,
        "MAC" => $mac,
        "BrowserVersion" => $Version,
        "UserName" => $username,
        "BrowserName" => $useragent,
        "OSName" => $os,
        "Country" => $country,
        "City"=>$city,
        "Latitude"=>$loc,
        "Pincode"=>$pincode,
        "ServiceProvider" => $serviceProvider,
        "HostName" => $hostname,
        "Date" => $this->data['date'],
        "Time" => $this->data['time'],
        );
        return $logindetails_data;
  }
  
  
  public function getBrowerInfo($ipUser){
        
      $full = false;
      $myIP = true;
      
      $ch = curl_init();
      $ipServeur = $_SERVER['SERVER_ADDR'];
      $ipUser = $_SERVER['REMOTE_ADDR'];
  
      if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
          || $_SERVER['SERVER_PORT'] == 443){
          $portServeur = 443 ; // HTTPS : 443
      }else{
          $portServeur = 80 ; // HTTP : 80
      }

      // set url
      curl_setopt($ch, CURLOPT_URL, "https://check.torproject.org/torbulkexitlist?ip=" . $ipServeur . "&port=" . $portServeur);

      //return the transfer as a string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      // $output contains the output string
      $output = curl_exec($ch);
      //print($output);
      if(strlen($output) != 0){
    
          if($full){
              print(htmlentities($output)) ;
          }
          if(strpos($output, $ipUser)){
    
            //The user is on the list
            if($myIP){
              return false;  // Tor Browser
            }
              
          }else{
            //The user is not on the list
            if($myIP){
              return true;  // Tor browser not exist
            }
          }
      }else{
          //trigger_error("No data can be loaded (empty variable). Maybe <a href='https://check.torproject.org/torbulkexitlist'>https://check.torproject.org/torbulkexitlist</a> is down.", E_USER_WARNING);
      }
      
      // close curl resource to free up system resources
      curl_close($ch); 
    }

		public function sendSMS($message,$mobile){
			$strUserName = "9450373735";
			$strPassword = "Sharda@1245";
			$strSenderId= "AGROON";
			$strMessage=$message;
			$strMobile="91".$mobile;

			$result=false;
	
			try{
			
			$url="https://www.smsidea.co.in/smsstatuswithid.aspx";
			$fields = array(
			'mobile' => $strUserName,
			'pass' => $strPassword,
			'senderid' => $strSenderId,
			'to' => $strMobile,
			'msg' => urlencode($strMessage)
			);
			$fields_string="";
			foreach($fields as $key=>$value) { $fields_string .=
				$key.'='.$value.'&'; }
			rtrim($fields_string, '&');
			
			$ch = curl_init();
			
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
			$res = curl_exec($ch);
			if($res!="" || $res!=null)
			{
				$result=true;
			}
			else
			{
				$result=false;
			}
			
				curl_close($ch);
			}
			catch(Exception $e){
			$res = 'Message:' .$e->getMessage();
			$result=false;
			}
			
			return $result;
		}


 }

?>
