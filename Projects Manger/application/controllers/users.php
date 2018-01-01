<?php

class users extends CI_Controller{


	// public function index(){
	// 	echo "Welcome";
	// }

	// public function View(){
 //        $data["users_data"]	= $this->users_model->get_users();
 // 		$this->load->view("view_users",$data);
	// }

	public function login(){
		
		$this->form_validation->set_rules("username","username","trim|required|min_length[4]");
		$this->form_validation->set_rules("password","password","trim|required|min_length[4]");
		$this->form_validation->set_rules("confirm_password","Confirm Password","trim|required|min_length[3]|matches[password]");
        	
        if ($this->form_validation->run() == FALSE) {
        	$data = array(

        		"errors" => validation_errors()

        	);
        	$this->session->set_flashdata($data);
        	
		redirect("home");
        }else{
        	$username = $this->input->post("username");
        	$password = $this->input->post("password");
        	$user_id = $this->users_model->user_login($username,$password);
        	
        	if($user_id){
        		$userdata = array(
        				"id" => $user_id,
        				"username"=>$username,
        				"logged_in"=>true
        			);
        		$this->session->set_userdata($userdata);
        		$this->session->set_flashdata("login-success","You are logged in !");
        			redirect("home");
        	}else{
        		$this->session->set_flashdata("login-failed","You are not logged in !");
        		redirect("home");
        	}


        }
        
        //echo $this->input->post("username");
	}



	public function logout(){
		$this->session->sess_destroy();
		redirect("home");

	}


	public function Register(){
		$this->form_validation->set_rules("username","username","trim|required|min_length[4]");
		$this->form_validation->set_rules("password","password","trim|required|min_length[4]");
		$this->form_validation->set_rules("confirm_password","Confirm Password","trim|required|min_length[3]|matches[password]");
		$this->form_validation->set_rules('first_name',"First Name","trim|min_length[3]|max_length[10]");
		$this->form_validation->set_rules('last_name',"last Name","trim|min_length[3]|max_length[10]");
		$this->form_validation->set_rules('email',"Email","trim|min_length[3]|required|min_length[8]");
		if($this->form_validation->run() == false){
			$errors = array(

					"errors" => validation_errors()


				);
			$this->session->set_flashdata($errors);
			redirect('home/register');
		}else {
			if($this->users_model->register()){
					$this->session->set_flashdata("message","Registeration Complete!");
					redirect("home");
			}
			
		} 
	}

}


?>