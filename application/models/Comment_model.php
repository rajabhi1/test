<?php 
/**
 * 
 */
class Comment_model extends CI_Model
{
	public function getuser()
	{ 
		$this->db->select('user.name,user.image,post.*');
		$this->db->from('user');
		// $this->db->where('user_id', '3');
		$this->db->join('post', 'user.id = post.user_id', 'inner')->order_by('post.add_time','DESC');
	    return $query = $this->db->get()->result();
	
	}

	public function logindata($email)
	{
		$get=$this->db->where('email',$email)
						->get('user');
						return $get->row();
	}

	public function userpost($data){
		// echo "<pre>"; print_r($); echo "</pre>"; die();
		$q=$this->db->insert('post',$data);
		return $q;
	}

	public function getlikes($postid,$userid)
	{
		$id['post_id'] = $postid;
		$id['user_id'] = $userid;

		$query="SELECT * FROM likes WHERE post_id=? AND user_id=?";	
		$sql = $this->db->query($query, $id)->num_rows();
			if($sql==1){
				$this->db->delete('likes',$id);
				 $get="SELECT * FROM post WHERE id=?";
					$getsql = $this->db->query($get, $postid)->row();
						$count=$getsql->likes;
						$like=$count-1;
					$update=$this->db->set('likes',$like)
										->where('id',$postid)->update('post');
				
			}else{
				$this->db->insert('likes',$id);

				$id1['id'] = $postid;
				// $id1['user_id'] = $userid;
					$get="SELECT * FROM post WHERE id=?";
					$getsql = $this->db->query($get, $postid)->row();
						$count=$getsql->likes;
						$like=$count+1;
					$update=$this->db->set('likes',$like)
										->where('id',$postid)->update('post');
										// retutn $update;
										echo "<pre>"; print_r($update); echo "</pre>"; die();	
			}
	}

}
?>
