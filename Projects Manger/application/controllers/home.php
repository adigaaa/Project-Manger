<?php

class home extends CI_Controller{

	public function index(){
		if ($this->session->userdata('logged_in') == TRUE) {
			$data["projects"] = $this->projects_model->user_projects();
			$data['chat'] =  $this->chat_model->get();
		}

		$data["main_view"] = "main_view";
		$data['login'] = "forms/login_form";
		$this->load->view("layout/main",$data);

	}
	
	public function Register(){
		$data['main_view'] = "forms/register";
		$this->load->view("layout/main",$data);
	}
	public function login(){
		$data['main_view'] = "forms/login_form";
		$this->load->view("layout/main",$data);
	}

}


?>