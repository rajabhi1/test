<?php

class Comments extends CI_Controller
{
	
	public function index()
	{
		// $this->load->view('comment_view');
		$this->load->model('comment_model','cmnt');
		$user['post']=$this->cmnt->getuser();
		$this->load->view('comment_view',$user);
	}

	public function login()
	{
		$this->load->view('userlogin');
	}

	public function loginform()
	{
		if($this->form_validation->run('login_rule')){
			$email=$this->input->post('email');
			// $pass=$this->input->post('password');
			$this->load->model('comment_model','cmnt');
			$logindata=$this->cmnt->logindata($email);
			if($logindata){

				$users=$this->session->set_userdata('id',$logindata);
				return redirect('comments/index',$users);
			}else{
			echo'false';
			// $this->load->view('login_view');
			}
		}else{
			$this->load->view('userlogin');
		}
	}
	public function logout(){
		$this->session->unset_userdata('id',$logindata);
		redirect('comments/login');
	}

	public function post()
	{
		if($this->form_validation->run('post')){
			$data['user_id']=$this->input->post('user_id');
			$data['cmnt']=$this->input->post('cmnt');
			$data['add_time']=date('Y-m-d H:i:s');
			$this->load->model('comment_model','cmnt');
			$postdata['posts']=$this->cmnt->userpost($data);
				if($postdata){
					redirect('comments/index');
				}
		}else{
			redirect('comments/index');
		}
	}

	public function like()
	{
		// echo "<pre>"; print_r($this->input->post()); echo "</pre>"; die();
		$postid=$this->input->post('id');
		$userid=$this->input->post('userid');
		$this->load->model('comment_model','cmnt');
		$liked=$this->cmnt->getlikes($postid,$userid);
		// redirect('comments/index');
		echo json_encode($liked);
		
	}
}
 ?>