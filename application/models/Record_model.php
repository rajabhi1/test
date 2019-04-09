<?php
/**
* 
*/
class Record_model extends CI_Model
{
	
	public function login_data($email,$pass){
		$get=$this->db->where(array('email' => $email,'password'=>$pass))
						->get('admin');
						return $get->row();
	}

	public function insert_user($post){

		$query= $this->db->insert('user',$post);
			return $query;
	}

	public function get_user(){

		$get=$this->db->get('user');
		return $get->result_array();
	}

	public function del_user($id){
		
		$del=$this->db->where('id',$id)->delete('user');
			return $del;
	}

	public function edit($id){

	  return $this->db->where('id',$id)->get('user')->row();
	}

	public function update_user($id,$post){
		$query=$this->db->where('id',$id)->update('user',$post);
		return $query;
		// echo "<pre>"; print_r($post); echo "</pre>"; die();
		// $update=$this->db->
	}
	public function all_records($limit,$offset){
		$q=$this->db->select('*')->from('user')
					->limit($limit,$offset)
					->order_by('created_on','DESC')
					->get();
		return $q->result_array();
	}
	public function count_alluser(){
			$q=$this->db->get('user');
		   return $q->num_rows();
		// echo "<pre>"; print_r('i'); echo "</pre>"; die();
	}

	public function search($query){
		$q= $this->db->select('*')->from('user')->like('name',$query)->get();
		return $q->result_array();
	}

	public function del_check($del){
		// echo "<pre>"; print_r($del); echo "</pre>"; die();
		$del_query=$this->db->where('id',$del)->delete('user');
		
	}

	public function check_email($to_emails){
		$q=$this->db->where('email',$to_emails)->get('admin');
		return $q->row();
	}
}
?>