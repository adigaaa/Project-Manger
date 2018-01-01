<?php 


class chat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}

	}
	public function index(){
		$data['main_view'] = "chat/chat";
		$this->load->view("layout/main",$data);

	}

	public function send(){

		if (!empty($this->input->post('message'))) {
			$data = array(
			  "message" => $this->input->post('message',true),
			  "user_id" => $this->session->userdata('id'),
			  "time" => time()
				);
			$this->chat_model->insert($data);
		
		} 
		
	}
	public function show(){

		$this->session->unset_userdata('message_id');
		$this->session->set_userdata('message_id',$this->chat_model->last_id());
		if($this->session->userdata('message_db') < $this->session->userdata('message_id')) {
			echo json_encode($this->chat_model->get_news());
			$this->session->set_userdata('message_db',$this->session->userdata('message_id'));
		}

	}


}

 ?>