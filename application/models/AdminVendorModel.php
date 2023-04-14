<?php
  
  defined("BASEPATH") OR exit("No direct script access allowed.");

  class AdminVendorModel extends CI_Model{
	  public function insertData($table, array $data){
		$this->db->insert($table, $data); 
		return $this->db->insert_id();
	  }
  
	  public function deleteWhere($table , array $where){
		return $this->db->where($where)
					   ->delete($table);
	  }

	  public function getAllDataASC($table,$field,$order="ASC"){
		$res=$this->db->select("*")
					  ->order_by($field,$order)
					  ->get($table);
		return $res->result_array();              
	  }

	  public function getAllDataWhere($table,array $where,$field,$order="ASC"){
		$res=$this->db->select("*")
					  ->where($where)
					  ->order_by($field,$order)
					  ->get($table);
		return $res->result_array();              
	  }

	 public  function getSingleDataWhere($table,$where){
        $res=$this->db->select("*")
                      ->where($where)
                      ->get($table);
        return $res->row_array();              
     }

	 public function getDataWhereIn($table,$field,$value){
		$res = $this->db->select("*")
						->where_in($field,$value)
						->get($table);
		return $res->result_array();				
	 }

	 public  function getSingleData($table,$field,$value){
        $res=$this->db->select("*")
                      ->where([$field=>$value])
                      ->get($table);
        return $res->row_array();              
     }

	  public function updateWhere($table,array $data, array $where){
        $res=$this->db->where($where)
                      ->update($table,$data);
        return $res; 
      }
  }

?>
