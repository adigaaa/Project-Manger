<?php  

class Projects extends CI_Controller{

	public function __construct(){

		parent::__construct();
		if(!$this->session->userdata("logged_in")){

			$this->session->set_flashdata("no access","You are not logged in ");

			redirect("home");

		}

	}

	public function index(){

		$data["projects"] = $this->projects_model->view();
		$data["main_view"] = "projects/projects";
		$this->load->view("layout/main",$data);

	}

	public function view($id){
		$data["projects"] = $this->projects_model->view_all($id);
			$data["tasks"] = $this->projects_model->view_tasks($id);
			$data["user"] = $this->tasks_model->user_create($data["projects"]->user_id);
			$data["main_view"] = "projects/view_project";
			$this->load->view("layout/main",$data);


	}
	public function create(){
		
		$this->form_validation->set_rules('project_name',"Project name","required|trim|min_length[5]|max_length[30]");
		$this->form_validation->set_rules('project_body',"Project body","required|trim|min_length[10]|max_length[500]");


		if ($this->form_validation->run() == FALSE) {
			$data["main_view"] = "projects/create_project";
			$this->load->view("layout/main",$data);
		}else{
			$data = array(
				"user_id"=>$this->session->userdata['id'],
				"project_name"=>$this->input->post("project_name"),
				"project_body"=>$this->input->post("project_body")
				);
			if($this->projects_model->insert($data)){
				$this->session->set_flashdata("message_create","Project Created !");
				redirect("projects");
			}else{
				$this->session->set_flashdata("message_create","Project Not Created !");
				redirect("projects/create");
			}
		}
	}


	public function update($project_id){
		$this->form_validation->set_rules('project_name',"Project name","required|trim|min_length[5]|max_length[30]");
		$this->form_validation->set_rules('project_body',"Project body","required|trim|min_length[10]|max_length[500]");
		if ($this->form_validation->run() == FALSE) {
			$data["project_info"] = $this->projects_model->get_project_info($project_id);
			$data["main_view"] = "projects/update_project";
			$this->load->view("layout/main",$data);
		}else{
			$data = array(
				"user_id"=>$this->session->userdata['id'],
				"project_name"=>$this->input->post("project_name"),
				"project_body"=>$this->input->post("project_body")
				);
			if($this->projects_model->update($project_id,$data)){
				$this->session->set_flashdata("message_update","Project updated !");
				redirect("projects");
			}else{
				$this->session->set_flashdata("message_update","Project Not updated !");
				redirect("projects");
			}
		}
	}

	public function delete($id){

		if ($this->projects_model->get_user_id($id) == $this->session->userdata('id')) {
			$this->projects_model->delete($id);
			$this->projects_model->delete_tasks($id);
			$this->session->set_flashdata('deleted', 'Deleted !!!');
		}
		redirect("projects");
	}

	public function get_user_projects(){
		return  $data["projects"] = $this->projects_model->user_projects();
	}
}

?>