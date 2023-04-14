<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
  function getCookieData(){
    $expire=time() + (10 * 365 * 24 * 60 * 60);
    $cookie= array('name'   => 'usercookie','value'  => $expire.rand(100000,999999).date("dmyhis"),   'expire' => $expire,);
    set_cookie($cookie);
  }

  function checkUser($userid=""){
		$CI	=&	get_instance();
		$CI->load->database();
		
		$user	=	$CI->db->get_where('register' , array('userid' => $userid))->row();
		if(!empty($user->userid)){
			return true;
		}else{
			return false;
		}
	 
  }

  function saveNotification($userid="",$title="",$description=""){
	$CI = &get_instance();
	$CI->load->database();
	$user	=	$CI->db->get_where('register' , array('userid' => $userid))->row_array();

	$data = array("userid"=>$userid,"title"=>$title,"description"=>$description,"role_id"=>$user['role'],'status'=>1,'date'=>date('Y-m-d'),'time'=>date('h:i:s a'));
	
	$user	=	$CI->db->insert('notification' , $data);
  }

  function getCurrentAddress($userid="",$addressid=""){

	$CI = &get_instance();
	$CI->load->database();

	$address	=	$CI->db->get_where('address' , array('userid' => $userid,'address_id'=>$addressid))->row_array();

	$data = array("addressid"=>$address['address_id'],"add_name"=>$address['name'],"add_mobile"=>$address['mobile'],"address"=>$address['address'],'add_land_mark'=>$address['land_mark'],'add_city'=>$address['city'],'add_pincode'=>$address['pincode'],"add_state"=>$address['state']);
	
	return $data;

  }

  function getTotalAmount($userid=""){

	   $CI	=&	get_instance();
		$CI->load->database();

	   $output = array("status"=>0,"msg"=>"","data"=>array());
	   if(!empty($userid)){
			$rows=$CI->dm->getAllDataWhere("cart",array("userid"=>$userid,'status'=>0),"cart_id","DESC");
			if(count($rows)){
				$discountamount = 0;
				$totalamount =0;
				foreach($rows as $row){
					
					$product = $CI->dm->getSingleData("product","product_id",$row['productid']);
					$price = $CI->dm->getSingleData("price","price_id",$row['priceid']);
					$discountamount+= ($price['gstamount']*$price['pack_in_number'])-$price['total_amount'];
					$totalamount+=($row['qty']*$price['total_amount']);
				}
				$output['totaldiscount']=round($discountamount,2);
				$output['totalamount']=round($totalamount,2);
				$output['status']=1;
				$output['msg']="Cart product found.";
			}else{
				$output['msg'] = "Cart not found.";
			}
		}else{
			$output['msg'] = "User id should not be empty.";
		}
		return $output;
		
  }

  function saveOrderProduct($userid="",$order_id="",$order_key=""){

	$CI	=&	get_instance();
	$CI->load->database();

	$output = array("status"=>0,"msg"=>"","data"=>array());
	if(!empty($userid)){
		$rows=$CI->dm->getAllDataWhere("cart",array("userid"=>$userid,'status'=>0),"cart_id","DESC");
		if(count($rows)){
			$discountamount = 0;
			$totalamount =0;
			foreach($rows as $row){
				
				$product = $CI->dm->getSingleData("product","product_id",$row['productid']);
				$price = $CI->dm->getSingleData("price","price_id",$row['priceid']);

				$data = array("userid"=>$userid,"order_id"=>$order_id,"order_key"=>$order_key,'productid'=>$product['product_id'],"product_name"=>$product['name'],"priceid"=>$price['price_id'],"mrp"=>$price['mrp'],'gst'=>$price['gst'],"gstamount"=>$price['gstamount'],"discount"=>$price['discount'],"offerprice"=>$price['offerprice'],'total_amount'=>$price['total_amount'],"qty"=>$row['qty'],'status'=>0,"order_status"=>"Open","date"=>date('Y-m-d'),"time"=>date("h:i:s a"));

				$res=$CI->db->insert("order_product",$data);

			}
			$output['totaldiscount']=round($discountamount,2);
			$output['totalamount']=round($totalamount,2);
			$output['status']=($res)?1:0;
			$output['msg']="";
		}else{
			$output['msg'] = "Cart not found.";
		}
	}else{
		$output['msg'] = "User id should not be empty.";
	}
	return $output;
	
}


function humanTime($date) {
	$timestamp = strtotime($date); 
	
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	if($currentTime >= $timestamp) {
	 $diff     = time()- $timestamp;
	 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
	 $diff = $diff / $length[$i];
	 }

	 $diff = round($diff);
	 return $diff . " " . $strTime[$i] . "(s) ago ";
	}
 }

 function prx($data){
	echo "<pre>";
	print_r($data);
	die();
 }

  function getString($name,$mobile,$email,$subject,$message){
            return $htmlContent = ' <!DOCTYPE html>
<html lang="en">
   <head>
      <title>Contact Page Email ResponseR</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="keywords" content="online contact form from aaracloud contact page" />
   </head>
   <body class="xlarry xskin skin-litecube-f color-6da1d3 mail-page xdesktop xskin-light xicons-traditional iframe fullheight" data-new-gr-c-s-check-loaded="14.1000.0" data-gr-ext-installed="">
      <div id="messagepreview" role="main">
         <div class="leftcol" role="region" aria-labelledby="aria-label-messagebody" style="margin-right: 0px;">
            <div id="messagebody">
               <div class="message-htmlpart" id="message-htmlpart1">
                  <style type="text/css">#message-htmlpart1 div.rcmBody .one-edge-shadow {
                     -webkit-box-shadow: 0 8px 6px -6px black;
                     -moz-box-shadow: 0 8px 6px -6px black;
                     box-shadow: 0 8px 6px -6px black}
                  </style>
                  <div class="rcmBody">
                     <div style="background-color: #e3e3e3">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #e3e3e3;padding: 20px;">
                           <tbody>
                              <tr>
                                 <td></td>
                                 <td valign="top" align="center" style="background-color: rgb(227,227,227)">
                                    <div align="center" width="640">
                                       <table width="640" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff">
                                          <tbody>
                                             <tr>
                                                <td>
                                                   <table cellpadding="0" cellspacing="0" width="100%" height="6px">
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                               <table width="640" cellspacing="0" cellpadding="0" border="0" bgcolor="#e3e3e3" align="center" height="6">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="100%" bgcolor="#e3e3e3" align="center">
                                                                           <p width="100%" style="border-bottom: 6px solid #F82626; min-height: 0px!important; max-height: 0px!important; font-size: 0px; margin: 0">&nbsp;</p>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td width="100%" valign="middle" bgcolor="#ffffff">
                                                               <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                                  <tbody>
                                                                     <tr>
                                                                          <center> <img src="https://aaraclouds.com/shivam_backup/userassets/images/logo.PNG" alt="Aara Technologies" width="124" height="auto" hspace="0" vspace="0" border="0" style="padding-top: 15px;">  
                                                                        </center>
                                                                        
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                              <tr>
                                                            <td height="26">
                                                               <p class="shadow" align="left" style="padding-left: 10px; margin: 0 0 5px">
                                                                  <strong>
                                                                  <span style="font-size: 16px">Dear Aara Cloud Admin,
                                                                  </span>
                                                                  </strong>
                                                               </p>
                                                               <center>
                                                                  <p style="font-size: 16px">A vistor want to contact your from aaraclouds website.</p>
                                                               </center>
                                                             </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                  
                                               
                                                   <table style="border: 1px solid #f1f2f2; color: #000000; background: #ffffff; margin: 30px 0px;padding: 15px 0" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" style="padding-left:15px;">
                                                      <tbody >
                                                    
                                                         <tr >
                                                            <td style="text-align: center;padding-bottom: 15px;"><strong>Full Name :</strong>.
                                                             '.$name.'</td>
                                                            <td style="text-align: center;padding-bottom: 15px;"><strong>Email :</strong> '.$email.' </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;padding-bottom: 15px;"><strong>Phone :</strong>'.$mobile.'</td>
                                                            <td style="text-align: center;padding-bottom: 15px;"><strong>Subject : </strong>'.$subject.'</td>
                                                         </tr>

                                                        <tr>
                                                            <td colspan="2" style="text-align: center;padding-bottom: 15px;"><strong>Message : </strong>'.$message.'</td>
                                                         </tr> 

                                                      </tbody>
                                                   </table>
                                                   <table width="640" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
                                                      <tbody>
                                                         <tr>
                                                            <td width="100%" bgcolor="white" align="center">
                                                               <div style="vertical-align: baseline; margin-top: 10px" class="sub-cont"> 
                                                                  <a rel="noreferrer" href="https://aaratechnologies.com/" title="Create &amp; Send Your Own Invitations" target="_blank">
                                                                  <img src="https://aaratechnologies.com/aara-2/assets/images/social/einvite-email-banner.webp" width="100%">
                                                                  </a>
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <table style="width: 100%!important; margin: 0px 0 0px" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                                      <tbody>
                                                         <tr>
                                                            <td style="font-size: 14px; font-weight: bold; color: #3b3e4a" valign="top" align="center">
                                                               <p style="margin: 17 0 15px; display: inline-block; padding-right: 10px; vertical-align: middle">Why Aaratechnologies ? Click to know</p>
                                                               <a style="text-decoration: none; background-color: #eb221e; color: #fff; font-size: 11px; padding-top: 4px; padding-bottom: 4px; padding-right: 10px; padding-left: 10px; border-radius: 40px" href="#" target="_blank" rel="noreferrer">? Watch it Now <i class="fa fa-chevron-circle-right fa-1 watch_arrow"></i></a>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td valign="top" align="center">
                                                               <table style="text-align: center; padding: 5px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td style="display: inline-block; vertical-align: middle" valign="middle" align="center">
                                                                           <table style="width: 140px; border-collapse: collapse; vertical-align: middle" width="140" cellspacing="0" cellpadding="0" border="0">
                                                                              <tbody>
                                                                                 <tr>
                                                                                    <td valign="middle" align="center">
                                                                                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                          <tbody>
                                                                                             <tr>
                                                                                                <td style="color: #364748; text-transform: capitalize; font-size: 12px; padding: 0 0 10px" valign="middle" align="center">
                                                                                                   <img alt="Ftr-trusted" src="https://aaratechnologies.com/aara-2/assets/images/social/vl-verified.webp" style="height: 50px">
                                                                                                   <span style="overflow: hidden; line-height: 16px; font-weight: bold; display: block; font-size: 12px; color: #3b3e4a; padding-bottom: 20px"> Verified</span>
                                                                                                </td>
                                                                                             </tr>
                                                                                          </tbody>
                                                                                       </table>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                        <td style="display: inline-block; vertical-align: middle" valign="middle" align="center">
                                                                           <table style="width: 140px; border-collapse: collapse; vertical-align: middle" width="140" cellspacing="0" cellpadding="0" border="0">
                                                                              <tbody>
                                                                                 <tr>
                                                                                    <td valign="middle" align="center">
                                                                                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                          <tbody>
                                                                                             <tr>
                                                                                                <td style="color: #364748; text-transform: capitalize; font-size: 12px; padding: 0 0 10px" valign="middle" align="center">
                                                                                                   <img alt="Customized-pack" src="https://aaratechnologies.com/aara-2/assets/images/social/verified-1.webp" style="height: 50px">
                                                                                                   <span style="overflow: hidden; line-height: 16px; font-weight: bold; display: block; font-size: 12px; color: #3b3e4a; padding-bottom: 20px">Quality Control</span>
                                                                                                </td>
                                                                                             </tr>
                                                                                          </tbody>
                                                                                       </table>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                        <td style="display: inline-block; vertical-align: middle" valign="middle" align="center">
                                                                           <table style="width: 140px; border-collapse: collapse; vertical-align: middle" width="140" cellspacing="0" cellpadding="0" border="0">
                                                                              <tbody>
                                                                                 <tr>
                                                                                    <td valign="middle" align="center">
                                                                                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                          <tbody>
                                                                                             <tr>
                                                                                                <td style="color: #364748; text-transform: capitalize; font-size: 12px; padding: 0 10px 10px" valign="middle" align="center">
                                                                                                   <img alt="Best-price-guaran" src="https://aaratechnologies.com/aara-2/assets/images/social/call-support.webp" style="height: 50px">
                                                                                                   <span style="overflow: hidden; line-height: 16px; font-weight: bold; display: block; font-size: 12px; color: #3b3e4a; padding-bottom: 20px">24*7 Support</span>
                                                                                                </td>
                                                                                             </tr>
                                                                                          </tbody>
                                                                                       </table>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <p style="margin: 10px; text-align: center; line-height: 26px">
                                                      For awesome Event options and deals, Follow us on:<br>
                                                      <a href="https://www.facebook.com/aaratechnologies/" target="_blank" rel="noreferrer">
                                                      <img src="https://aaratechnologies.com/aara-2/assets/images/social/fb.webp" border="0"></a>

                                                      <a href="https://www.linkedin.com/company/aaratechnologies" target="_blank" rel="noreferrer"><img src="https://aaratechnologies.com/aara-2/assets/images/social/in.webp" border="0"></a>

                                                      <a href="https://twitter.com/aaratechnology" target="_blank" rel="noreferrer"><img src="https://aaratechnologies.com/aara-2/assets/images/social/twiter.webp" border="0"></a>

                                                     
                                                   </p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <table width="640" border="0" align="center" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
                                          <tbody>
                                             <tr>
                                                <td width="69%">
                                                   <table border="0" align="left" cellpadding="6" cellspacing="0">
                                                      <tbody>
                                                         <tr>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="31%" align="right">
                                                   <table border="0" cellpadding="6" cellspacing="0" align="right">
                                                      <tbody>
                                                         <tr>
                                                            <td><font style="font-family: verdana,arial,sans-serif; font-size: 10px; color: #999" color="#999" face="verdana,arial,sans-serif" size="1"></font></td>
                                                            <td><font style="font-family: verdana,arial,sans-serif; font-size: 10px; color: #999" color="#999" face="verdana,arial,sans-serif" size="1"></font></td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <table width="640" cellspacing="0" cellpadding="0" border="0" bgcolor="white" align="center" height="22">
                                          <tbody>
                                             <tr>
                                                <td width="100%" height="22" align="center" bgcolor="white">
                                                   <p width="100%" style="border-bottom: 3px solid #666666; min-height: 0px!important; max-height: 0px!important; font-size: 0px; margin: 0">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <table style="font-family: arial,sans-serif; font-size: 10px; color: #999; line-height: 16px" border="0" cellpadding="10" cellspacing="0" width="640" align="center">
                                          <tbody>
                                             <tr>
                                                <td align="center" valign="top">
                                                   © 2021 Aara Technologies Pvt Ltd. All rights reserved.<br>
                                                   <br>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

';
        }
    

 function getOrderTemplate(array $order, array $payment){
    
	return $htmlContent='<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Contact Page Order ResponseR</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="keywords" content="online contact form from aaracloud contact page" />
   </head>
   <body class="xlarry xskin skin-litecube-f color-6da1d3 mail-page xdesktop xskin-light xicons-traditional iframe fullheight" data-new-gr-c-s-check-loaded="14.1000.0" data-gr-ext-installed="">
      <div id="messagepreview" role="main">
         <div class="leftcol" role="region" aria-labelledby="aria-label-messagebody" style="margin-right: 0px;">
            <div id="messagebody">
               <div class="message-htmlpart" id="message-htmlpart1">
                  <style type="text/css">#message-htmlpart1 div.rcmBody .one-edge-shadow {
                     -webkit-box-shadow: 0 8px 6px -6px black;
                     -moz-box-shadow: 0 8px 6px -6px black;
                     box-shadow: 0 8px 6px -6px black}
                  </style>
                  <div class="rcmBody">
                     <div style="background-color: #e3e3e3">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #e3e3e3;padding: 20px;">
                           <tbody>
                              <tr>
                                 <td></td>
                                 <td valign="top" align="center" style="background-color: rgb(227,227,227)">
                                    <div align="center" width="640">
                                       <table width="640" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#ffffff">
                                          <tbody>
                                             <tr>
                                                <td>
                                                   <table cellpadding="0" cellspacing="0" width="100%" height="6px">
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                               <table width="640" cellspacing="0" cellpadding="0" border="0" bgcolor="#e3e3e3" align="center" height="6">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="100%" bgcolor="#e3e3e3" align="center">
                                                                           <p width="100%" style="border-bottom: 6px solid #F82626; min-height: 0px!important; max-height: 0px!important; font-size: 0px; margin: 0">&nbsp;</p>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td width="100%" valign="middle" bgcolor="#ffffff">
                                                               <table border="1" cellpadding="0" cellspacing="0" align="left">
                                                                  <tbody>
                                                                     <tr>
                                                                        <center> <img src="https://aaraclouds.com/shivam_backup/userassets/images/logo.PNG" alt="Aara Technologies" width="124" height="auto" hspace="0" vspace="0" border="0" style="padding-top: 15px;">  
                                                                        </center>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td height="26">
                                                               <p class="shadow" align="left" style="padding-left: 10px; margin: 0 0 5px">
                                                                  <strong>
                                                                  <span style="font-size: 16px">Dear Customer,
                                                                  </span>
                                                                  </strong>
                                                               </p>
                                                               <p style="padding-left: 10px;">
                                                                  You have received an order on  <a href="https://aaraclouds.com/" target="_blank" style="color:red;">https://aaraclouds.com/
                                                                  <a>
                                                               <p>
                                                               <p class="shadow" align="left" style="padding-left: 10px; margin: 0 0 5px">
                                                               <strong>
                                                               <span style="font-size: 16px">Please Note : 
                                                               </span>
                                                               </strong>
                                                               <span>The charge will appear on your credit card / Account statement as "Aara Cloud Domains and Hosting Services Pvt Ltd."</span>
                                                               </p>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                         <td style="padding-left: 10px;">For your convenience, we have included a copy of your order below.</td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <table style="border: 1px solid #f1f2f2; color: #000000; background: #ffffff; margin: 30px 0px;padding: 15px 0" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center" style="padding-left:15px;">
                                                   <thead>
                                                   <tr style="backgroup:gray;">
													   <th>Order#<th>
													   <th>Order Date<th>
													   <th>Order Amount<th>
                                                   </tr>	
                                                   </thead>
                                                   <tbody >
                                                   <tr style="backgroup:gray;text-align:center;">
													   <td>'.$order["orderid"].'<td>
													   <td>'.date("M d, Y",strtotime($order['date'])).'<td>
													   <td>'.$order['total_amount'].'<td>
                                                   </tr>
                                                   </tbody>
                                                   </table>
                                                   <p style="padding-left:10px;"><strong>Billing Details</strong></p>
                                                   <hr/>
                                                   <table style="width: 100%!important;  padding:20px;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
													   <tbody>
														   <tr style="height:34px;padding-left:20px;">
															   <th>Customer : </th> 
															   <td>'.$order['name'].' | '.$order['email'].' | '.$order['mobile'].'</td> 
														   </tr>
														   <tr style="height:34px;padding-left:20px;">
															   <th>Address : </th> 
															   <td>'.$order['address'].', '.$order['city'].', '.$order['state'].' - '.$order['pincode'].' , '.$order['country'].'</td> 
														   </tr>
														   <tr style="height:34px;padding-left:20px;">
															   <th>Customer IP : </th> 
															   <td>'.$order['ip'].'</td> 
														   </tr>
													   <tr style="height:34px;padding-left:20px;">
													   <th>Payment ID : </th> 
													   <td>'.$payment['razorpay_payment_id'].'</td> 
													   </tr>
													   </tbody>
                                                   </table>
                                                   <table width="640" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="padding:10px;">
													   <tbody>
													   <tr>
															<td width="100%" bgcolor="white" align="center">
															<div style="vertical-align: baseline; margin-top: 10px" class="sub-cont"> 
															<a rel="noreferrer" href="https://aaratechnologies.com/" title="Create &amp; Send Your Own Invitations" target="_blank">
															<img src="https://aaratechnologies.com/aara-2/assets/images/social/einvite-email-banner.webp" width="100%">
															</a>
													   </div>
													   </td>
													   </tr>
													   </tbody>
                                                   </table>
                                                   <table style="width: 100%!important; margin: 0px 0 0px" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">
                                                      <tbody>
                                                         <tr>
                                                            <td style="font-size: 14px; font-weight: bold; color: #3b3e4a" valign="top" align="center">
                                                               <p style="margin: 17 0 15px; display: inline-block; padding-right: 10px; vertical-align: middle">Why Aaratechnologies ? Click to know</p>
                                                               <a style="text-decoration: none; background-color: #eb221e; color: #fff; font-size: 11px; padding-top: 4px; padding-bottom: 4px; padding-right: 10px; padding-left: 10px; border-radius: 40px" href="#" target="_blank" rel="noreferrer">? Watch it Now <i class="fa fa-chevron-circle-right fa-1 watch_arrow"></i></a>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td valign="top" align="center">
                                                               <table style="text-align: center; padding: 5px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td style="display: inline-block; vertical-align: middle" valign="middle" align="center">
                                                                           <table style="width: 140px; border-collapse: collapse; vertical-align: middle" width="140" cellspacing="0" cellpadding="0" border="0">
                                                                              <tbody>
                                                                                 <tr>
                                                                                    <td valign="middle" align="center">
                                                                                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                          <tbody>
                                                                                             <tr>
                                                                                                <td style="color: #364748; text-transform: capitalize; font-size: 12px; padding: 0 0 10px" valign="middle" align="center">
                                                                                                   <img alt="Ftr-trusted" src="https://aaratechnologies.com/aara-2/assets/images/social/vl-verified.webp" style="height: 50px">
                                                                                                   <span style="overflow: hidden; line-height: 16px; font-weight: bold; display: block; font-size: 12px; color: #3b3e4a; padding-bottom: 20px"> Verified</span>
                                                                                                </td>
                                                                                             </tr>
                                                                                          </tbody>
                                                                                       </table>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                        <td style="display: inline-block; vertical-align: middle" valign="middle" align="center">
                                                                           <table style="width: 140px; border-collapse: collapse; vertical-align: middle" width="140" cellspacing="0" cellpadding="0" border="0">
                                                                              <tbody>
                                                                                 <tr>
                                                                                    <td valign="middle" align="center">
                                                                                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                          <tbody>
                                                                                             <tr>
                                                                                                <td style="color: #364748; text-transform: capitalize; font-size: 12px; padding: 0 0 10px" valign="middle" align="center">
                                                                                                   <img alt="Customized-pack" src="https://aaratechnologies.com/aara-2/assets/images/social/verified-1.webp" style="height: 50px">
                                                                                                   <span style="overflow: hidden; line-height: 16px; font-weight: bold; display: block; font-size: 12px; color: #3b3e4a; padding-bottom: 20px">Quality Control</span>
                                                                                                </td>
                                                                                             </tr>
                                                                                          </tbody>
                                                                                       </table>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                        <td style="display: inline-block; vertical-align: middle" valign="middle" align="center">
                                                                           <table style="width: 140px; border-collapse: collapse; vertical-align: middle" width="140" cellspacing="0" cellpadding="0" border="0">
                                                                              <tbody>
                                                                                 <tr>
                                                                                    <td valign="middle" align="center">
                                                                                       <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                          <tbody>
                                                                                             <tr>
                                                                                                <td style="color: #364748; text-transform: capitalize; font-size: 12px; padding: 0 10px 10px" valign="middle" align="center">
                                                                                                   <img alt="Best-price-guaran" src="https://aaratechnologies.com/aara-2/assets/images/social/call-support.webp" style="height: 50px">
                                                                                                   <span style="overflow: hidden; line-height: 16px; font-weight: bold; display: block; font-size: 12px; color: #3b3e4a; padding-bottom: 20px">24*7 Support</span>
                                                                                                </td>
                                                                                             </tr>
                                                                                          </tbody>
                                                                                       </table>
                                                                                    </td>
                                                                                 </tr>
                                                                              </tbody>
                                                                           </table>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                   <p style="margin: 10px; text-align: center; line-height: 26px">
                                                      For awesome Event options and deals, Follow us on:<br>
                                                      <a href="https://www.facebook.com/aaratechnologies/" target="_blank" rel="noreferrer">
                                                      <img src="https://aaratechnologies.com/aara-2/assets/images/social/fb.webp" border="0"></a>
                                                      <a href="https://www.linkedin.com/company/aaratechnologies" target="_blank" rel="noreferrer"><img src="https://aaratechnologies.com/aara-2/assets/images/social/in.webp" border="0"></a>
                                                      <a href="https://twitter.com/aaratechnology" target="_blank" rel="noreferrer"><img src="https://aaratechnologies.com/aara-2/assets/images/social/twiter.webp" border="0"></a>
                                                   </p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <table width="640" border="0" align="center" cellpadding="8" cellspacing="0" bgcolor="#FFFFFF">
                                          <tbody>
                                             <tr>
                                                <td width="69%">
                                                   <table border="0" align="left" cellpadding="6" cellspacing="0">
                                                      <tbody>
                                                         <tr>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="31%" align="right">
                                                   <table border="0" cellpadding="6" cellspacing="0" align="right">
                                                      <tbody>
                                                         <tr>
                                                            <td><font style="font-family: verdana,arial,sans-serif; font-size: 10px; color: #999" color="#999" face="verdana,arial,sans-serif" size="1"></font></td>
                                                            <td><font style="font-family: verdana,arial,sans-serif; font-size: 10px; color: #999" color="#999" face="verdana,arial,sans-serif" size="1"></font></td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <table width="640" cellspacing="0" cellpadding="0" border="0" bgcolor="white" align="center" height="22">
                                          <tbody>
                                             <tr>
                                                <td width="100%" height="22" align="center" bgcolor="white">
                                                   <p width="100%" style="border-bottom: 3px solid #666666; min-height: 0px!important; max-height: 0px!important; font-size: 0px; margin: 0">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <table style="font-family: arial,sans-serif; font-size: 10px; color: #999; line-height: 16px" border="0" cellpadding="10" cellspacing="0" width="640" align="center">
                                          <tbody>
                                             <tr>
                                                <td align="center" valign="top">
                                                   © 2021 Aara Technologies Pvt Ltd. All rights reserved.<br>
                                                   <br>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>';
 }
?>
