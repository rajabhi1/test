<?php
 public function likesajax($data)
	{
		$sql="SELECT * FROM likes WHERE postid=? AND userid=?";
		$query=$this->db->query($sql,$data);
		if($query->num_rows()==1)
		{
			$this->db->delete('likes',$data);
			$sql1="SELECT likes FROM posts WHERE postid=? AND userid=?";
			$query1=$this->db->query($sql1,$data);
			foreach($query1->result() as $like)
			{
				$count=$like->likes;
				$count--;
			}
			$data1=array('likes'=>$count);
			$this->db->set('likes',$count);
			$this->db->where('postid',$data['postid']);
			$this->db->update('posts');
			$data1=array('result'=>FALSE,'count'=>$count);
			return $data1;
		}
		else
		{
			$this->db->insert('likes',$data);
			$sql1="SELECT likes FROM posts WHERE postid=? AND userid=?";
			$query1=$this->db->query($sql1,$data);
			foreach($query1->result() as $like)
			{
				$count=$like->likes;
				$count=$count+1;
			}
			$data1=array('likes'=>$count);
			$this->db->set('likes',$count);
			$this->db->where('postid',$data['postid']);
			$this->db->update('posts');
			$data1=array('result'=>TRUE,'count'=>$count);
			return $data1;
		}
	}
