<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function about_us(){
		$this->load->library('cart');
		$data['alldata']=$this->cart->contents();
		$this->load->view('header', $data);
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function contactus(){
		$this->load->library('cart');
		$data['alldata']=$this->cart->contents();
		$this->load->view('header', $data);
		$this->load->view('contact_us');
		$this->load->view('footer');
	}

	public function enquery(){
		if(!$this->form_validation->run('contact_form')){
			$this->load->library('cart');
			$data['alldata']=$this->cart->contents();
			$this->load->view('header', $data);
			$this->load->view('contact_us');
			$this->load->view('footer');
			// $this->load->view('contact_us');+
		}else{
			$name=$this->input->post('username');
			$phone=$this->input->post('phone');
			$message=$this->input->post('message');
			$email=$this->input->post('email');

			$body = 'UserName: ' .$name. '<br>';
			$body .= 'Email: ' .$email. '<br>';
			$body .= 'Phone: ' .$phone. '<br><br>';
			$body .= 'Message: ' .$message. '<br>';

			$subject = 'Contact_Us';
	        $this->load->config('ebrandz_email');
	        $email_config = $this->config->config['ebrandz_email'];   	
	        $this->load->library('email');
	        $this->email->initialize($email_config);
	        $this->email->clear(TRUE); //IMP
	        $this->email->from('donot-reply@edeveloperz.com','contact_us');
	        $this->email->to('abhishek.r@ebrandz.com');
	        $this->email->bcc("abhishek.r@ebrandz.com");
	        $this->email->subject($subject);
	        $this->email->message($body);
	        $email_sent = 0;
      		$email_sent = $this->email->send(); 
	      	
	      		if($email_sent ==1){
	      			echo"sent successfully";
	      			// $this->load->view('contact_us');
		      	  	return redirect('admin/contactus');
		    	}else{
			    	echo $this->email->print_debugger();
		        	return "failure";
	   			}
		}
	}


	public function index(){
		$this->load->library('pagination');
		$config=[
			
			'base_url'=>base_url('admin/index'),
			'per_page'=>'5',
			'total_rows'=>$this->record_model->count_alluser(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul",
			'first_tag_open'=>"<li>",
			'first_tag_close'=>"</li>",
		];
		$this->pagination->initialize($config);
		$this->load->library('cart');
		$records['alldata']=$this->cart->contents();
		$records['alluser']=$this->record_model->all_records($config['per_page'],$this->uri->segment(3));
			if($records){
				$this->load->view('header', $records);
				$this->load->view('admin_view');
				$this->load->view('footer');
			// $this->load->view('admin_view',$records);
			}else{
				echo'1';
			}		
	}

	public function search(){

		$this->form_validation->set_rules('query','query','required');
		if(!$this->form_validation->run()){
			$this->index();
		}else{
			$query=$this->input->post('query');
			$this->load->library('cart');
			$data['alldata']=$this->cart->contents();
			$data['searchquery']=$this->record_model->search($query);
			$this->load->view('header',$data);
			// $this->load->view('header', $records);
				$this->load->view('search_view');
				$this->load->view('footer');
		}
	}

	public function login(){

		// $this->form_validation->set_rules($config);
		if($this->form_validation->run('login_rule')){
			$email=$this->input->post('email');
			$pass=$this->input->post('password');
			$logindata=$this->record_model->login_data($email,$pass);
			if($logindata){
				$this->session->set_userdata('id',$logindata);
				return redirect('admin/dashboard');
			}else{
			echo'false';
			// $this->load->view('login_view');
			}
		}else{
			$this->load->view('login_view');
		}
	}

	public function logout(){
		$this->session->unset_userdata('id',$logindata);
		redirect('admin');
	}

	public function dashboard()
	{
		$this->load->library('cart');
		$userlist['alldata']=$this->cart->contents();
		$userlist['allrecords']=$this->record_model->get_user();
		if($userlist){
			$this->load->view('header', $userlist);
			$this->load->view('dashboard');
			$this->load->view('footer');
			// echo "<pre>"; print_r($this->record_model->get_user()); echo "</pre>"; die();
			// $this->load->view('dashboard',$userlist);
		}
		
	}

	public function add_user(){
		$this->load->library('cart');
		$data['alldata']=$this->cart->contents();
		$this->load->view('header', $data);
		$this->load->view('adduser');
		$this->load->view('footer');
		// $this->load->view('adduser');
	}
	public function userdata(){
		$config=[
				'upload_path' =>'./uploads/',
				'allowed_types'=>'gif|jpg|png|jpeg',
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('user_form')&& $this->upload->do_upload('image')){
			$post=$this->input->post();
				unset($post['submit']);
				$data=$this->upload->data(); 
				$image_path=base_url("uploads/".$data['raw_name'] . $data['file_ext']);
			$post['image']=$image_path;
			// date_default_timezone_set("Asia/kolkata");
			$post['created_on']=date('Y-m-d H:i:s');
			if($this->record_model->insert_user($post)){
				$this->session->set_flashdata('feedback','user added successfully.');
				$this->session->set_flashdata('feedback_class','alert-success');
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('feedback','user failed to add,Please Try Again.');
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			// echo "<pre>"; print_r($post); echo "</pre>"; die();
		}else{
			$this->load->library('cart');
			$upload_error['alldata']=$this->cart->contents();
			$upload_error['img_error']=$this->upload->display_errors();
			$this->load->view('header',$upload_error);
			$this->load->view('header', $data);
			$this->load->view('adduser');
			$this->load->view('footer');
		}
	}

	public function edit_data(){

		$id=$this->uri->segment(3);
		$this->load->library('cart');
		$data['alldata']=$this->cart->contents();
		$data['userdata']=$this->record_model->edit($id);
		if($data){
			$this->load->view('header', $data);
			$this->load->view('edit_user');
			$this->load->view('footer');
		// $this->load->view('edit_user',$data);
		}

	}
	public function update($id){
		$config=[
				'upload_path' =>'./uploads/',
				'allowed_types'=>'gif|jpg|png|jpeg',
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('user_form')&& $this->upload->do_upload('image')){
			$post=$this->input->post();
				unset($post['submit']);
				$data=$this->upload->data(); 
				$image_path=base_url("uploads/".$data['raw_name'] . $data['file_ext']);
			$post['image']=$image_path;
			// date_default_timezone_set("Asia/kolkata");
			$post['created_on']=date('Y-m-d H:i:s');
			$data['userdata']=$this->record_model->update_user($id,$post);
			if($data){
				$this->session->set_flashdata('feedback','Record updated successfully.');
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('feedback','Record failed to update,Please Try Again.');
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			
		}else{
			$this->load->library('cart');
			$upload_error['alldata']=$this->cart->contents();
			$upload_error['img_error']=$this->upload->display_errors();
			$this->load->view('header',$upload_error);
			$this->load->view('edit_user');
			$this->load->view('footer');
		
		}
	}

	public function delete(){
		$id=$this->uri->segment(3);
		$del=$this->record_model->del_user($id);
		if($del){
			$this->session->set_flashdata('feedback','record delete successfully.');
				$this->session->set_flashdata('feedback_class','alert-success');
			}else{
				$this->session->set_flashdata('feedback','Record failed to delete,Please Try Again.');
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
	redirect('admin/dashboard');
	}

	public function forgetpass(){
		$this->load->view('sent_mail');
	}

		public function sentmail() { 

			if($this->form_validation->run('forget_email')==TRUE){

				$to_emails=$this->input->post('email');
				 $email=$this->record_model->check_email($to_emails);
// echo "<pre>"; print_r($email); echo "</pre>"; die();
				if($email==TRUE){
					$body = 'hello,this is testing';
					$subject = 'for testing';
			        $this->load->config('ebrandz_email');
			        $email_config = $this->config->config['ebrandz_email'];   	
			        $this->load->library('email');
			        $this->email->initialize($email_config);
			        $this->email->clear(TRUE); //IMP
			        $this->email->from('donot-reply@edeveloperz.com','Signature Email');
			        $this->email->to($email);
			        $this->email->bcc("abhishek.r@ebrandz.com");
			        $this->email->subject($subject);
			        $this->email->message($body);
			        $email_sent = 0;
		      		$email_sent = $this->email->send(); 
			      	
		      		if($email_sent == 1){
			      	  	return "success";
			    	}else{
			    		echo $this->email->print_debugger();
		        		return "failure";
		    		}
				}else{
					redirect('admin/forgetpass');
				}

				
		    }else{
		    	redirect('admin/forgetpass');
		    }
    	}

    	public function multi_checkbox(){
    		$del=$this->input->post('checkbox');
    		foreach ($del as $key => $value) {
    			$this->record_model->del_check($value);
    		}
    		redirect('admin/dashboard');
    	}

    	public function category(){
    		$this->load->library('cart');
    		$data['alldata']=$this->cart->contents();
    		$data['allproduct']=$this->record_model->get_product();
    		$this->load->view('header', $data);
    		$this->load->view('category');
    		$this->load->view('footer');
    		
    		
    	}

    	public function add_to_cart()
    	{
    		$id=$this->uri->segment(3);
    		$product=$this->record_model->product($id);
  			if($product){
	  			foreach ($product as $key => $value) {
	  				$this->load->library('cart');
			    		$data = array(
						        'id'      => $value['id'],
						        'qty'     => 1,
						        'price'   => $value['price'],
						        'name'    => $value['name']
						        // 'coupon'         => 'XMAS-50OFF'
						);
				$this->cart->insert($data);
	  			}
	  			redirect('admin/category');
	  		}else{
	  			echo'dsgf';
	  		}    		
    	}

    	public function cartdata(){
    		$this->load->library('cart');
    		$data['alldata']=$this->cart->contents();
    		$this->load->view('header', $data);
    		$this->load->view('cart_view');
    		$this->load->view('footer');
    	}

    	public function update_cart(){
    		// echo "<pre>"; print_r($this->input->post()); echo "</pre>"; die();
    		
    		$data=$this->input->post(); 
    		$this->load->library('cart');
    		$this->cart->update($data);
    		redirect('admin/cartdata');
    	}

    	public function remove_cart(){
    		$id=$this->uri->segment(3);
    		$this->load->library('cart');
    		$this->cart->remove($id);
    		redirect('admin/cartdata');
    	}

    	public function uptodate($year=null,$month=null){

    			$config=array(
    						'start_day'=>'monday',
    						'show_next_prev'=>true,
    						'next_prev_url'=>base_url().'admin/uptodate'
    			);
				$this->load->library('Calendar',$config);
				echo $this->calendar->generate($year,$month);
    	}

    	public function calculator()
    	{
    		$this->load->view('calculator');
    	}
	}
?>