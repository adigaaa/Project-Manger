<?php  

class Tasks extends CI_Controller{

	public function __construct (){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata("login-failed","Not Logged in");
			redirect('home');
		}
	}
	public function index(){
		$this->display();
	}
	public function display($id= null){
		$pro =  $data["tasks"]  = $this->tasks_model->display($id);
		if (!is_null($id)) {
			 $pro = array_shift($pro); 
			$data["project"] = $this->tasks_model->project_name($pro->project_id);
			$data['user'] = $this->tasks_model->user_create($data["project"]->user_id);
		}
		///$data['user_id'] =;
		$data["main_view"] = "tasks/display";
		$this->load->view("layout/main",$data);
	}

	public function create($id){
	 
		$this->form_validation->set_rules("task_name","Task Name","trim|required|max_length[10]|min_length[3]");
		$this->form_validation->set_rules("task_body","Task Body","trim|required|min_length[20]");
		if ($this->form_validation->run() == FALSE) {
			$data["errors_task"] = validation_errors();
			$data["main_view"] = "tasks/create";
			$this->load->view("layout/main",$data);
		}else{
			$data = array(
				"task_name"=>$this->input->post("task_name"),
				"task_body"=>$this->input->post("task_body"),
				"project_id"=>$id
				);
			
			if ($this->tasks_model->insert($data)) {
				$this->session->set_flashdata('task_aded',"The Task aded successfull !");
				redirect('projects/view/'.$id);
			}
		}
	}

	public function edit($task_id){
		if(is_null($task_id))
			redirect('tasks/display/');
		if ($this->tasks_model->task_user_id($task_id) == $this->session->userdata('id')) {
		$this->form_validation->set_rules("task_name","Task Name","trim|required|max_length[10]|min_length[3]");
		$this->form_validation->set_rules("task_body","Task Body","trim|required|min_length[20]");
		if ($this->form_validation->run() == FALSE) {
			$data["errors_task"] = validation_errors();
			$data["task_info"] = $this->tasks_model->display($task_id);
			$data["main_view"] = "tasks/edit";
			$this->load->view("layout/main",$data);
		}else{
			$data = array(
				"task_name"=>$this->input->post("task_name"),
				"task_body"=>$this->input->post("task_body"),
				);
			
			if ($this->tasks_model->update($task_id,$data)) {
				$this->session->set_flashdata('task_update',"The Task Updated successfull !");
				redirect('tasks/display/'.$task_id);
			}

		}
		}else{
			redirect('home');
		}
	}

	public function delete($id){
		if ($this->tasks_model->task_user_id($id) == $this->session->userdata('id')) {
				$this->tasks_model->delete($id);
				$this->session->set_flashdata('task_delete',"The Task Delete successfull !");
				redirect('tasks/display/');
		}else{
			redirect("home");
		}
	}

}

?>