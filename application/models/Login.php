<?php
  defined('BASEPATH') OR  exit("No direct script access allowed");

  class Login extends CI_Model{
    public function adminAuth($table,array $data){
       $res= $this->db->select("*")
                        ->where($data)
                        ->get($table);
                        //echo $this->db->last_query();
        return $res->row_array();                
    }
  }

?>