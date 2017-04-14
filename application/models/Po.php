<?php
class Po extends CI_Model
{
	function insert($table, $data){
		if($table!='')
		{
			$this->db->insert($table, $data);
			$result = $this->db->insert_id();
			if($result)
			{
				return array('status'=>'success','id' => $result,'msg'=>'');
			}else{
				return array('status'=>'error','msg'=>'There was an error.');			
			}
		}
	}
	function get_list($table, $cond,$return='array'){
		$data = $this->db->get_where($table, $cond);
		
		if($return == 'object')
			return $data->result_object();
		else
			return $data->result_array();
	}
}