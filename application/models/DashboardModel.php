<?php
  defined("BASEPATH") OR exit("No direct script allowed.");

  class DashboardModel extends CI_Model{

    public function singleData($table,$field,$wherefield,$id){ 
      $q=$this->db->select($field)
              ->where($wherefield,$id)
              ->get($table);
      return $q->row_array();     
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

	public function getAllDataWhereIn($table,array $where,$in_field,$in_value,$field,$order="ASC"){
      $res=$this->db->select("*")
                    ->where($where)
										->where_in($in_field,$in_value)
                    ->order_by($field,$order)
                    ->get($table);
      return $res->result_array();              
    }

    public  function getSingleData($table,$field,$value){
        $res=$this->db->select("*")
                      ->where([$field=>$value])
                      ->get($table);
        return $res->row_array();              
    }
	
	public  function getSingleDataWhere($table,$where){
        $res=$this->db->select("*")
                      ->where($where)
                      ->get($table);
        return $res->row_array();              
    }

    public function updateWhere($table,array $data, array $where){
        $res=$this->db->where($where)
                      ->update($table,$data);
        return $res; 
    }

    public function insertData($table, array $data){
      $this->db->insert($table, $data); 
      return $this->db->insert_id();
    }

    public function deleteWhere($table , array $where){
      return $this->db->where($where)
                     ->delete($table);
    }

    public function getSingleValueWhere($table,array $where,$field){
      $res=$this->db->select($field)
                    ->where($where)
                    ->get($table);

      if($res){
        foreach ($res->result() as $row){
          return $val = stripslashes($row->$field);
        }
      }
      else{
        return false;
      }
    }

    public function counting($table){
        $query=$this->db->get($table);
        return $query->num_rows();
    }

		public function countingWhere($table,$where){
			$query=$this->db->where($where)
									->get($table);
			return $query->num_rows();
	}

	public function getAllPendingDataWhere($table,$from,$to,$join,$where,$jointype,$order_field,$order="ASC"){

    $query=$this->db->select($table)
                    ->from($from)
                    ->join($to, $join,$jointype)
                    ->where($where)
									   ->order_by($order_field,$order)
                    ->get();
                    // echo $this->db->last_query();
										// die();

    return $query->result_array();
  }

}
?>
