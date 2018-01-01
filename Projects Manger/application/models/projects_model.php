<?php  


class Projects_model extends CI_Model{

	public function get_user_id($id){
		$this->db->where('project_id',$id);
		return ($this->db->get('projects'))->row()->user_id;
	}
	public function view(){
		$result = $this->db->get("projects");
		return $result->result();
	}
	public function view_tasks($p_id){
		$this->db->select('
			tasks.project_id,
			tasks.id as task_id,
			tasks.task_name
			');
		$this->db->from('tasks');

		$this->db->join('projects', 'tasks.project_id = projects.project_id ');
		$this->db->where('tasks.project_id', $p_id);
		$result = $this->db->get();
		if ($result->num_rows() < 1) {
			return false;
		}
		return $result->result();
	}

	public function view_all($id){
		$this->db->where("project_id",$id);
		$result =  $this->db->get('projects');
		  return $result->row();

	}
	public function insert($data){

		return $this->db->insert("projects",$data);
	}
	public function get_project_info($id){
		$this->db->where('project_id', $id);
		$result =  $this->db->get('projects');
		return $result->row();
	}
	public function Update($project_id,$data){

		$this->db->where("project_id", $project_id);
		if ($this->db->update('projects', $data)) {
			return true;
		}else{
			return  false;	
		}
		
	}
	public function delete($id){
		$this->db->where('project_id', $id);
		$this->db->delete('projects');
	}
	public function delete_tasks($id){
		$this->db->where('project_id', $id);
		$this->db->delete('tasks');
	}
	public function user_projects(){
		$this->db->where('user_id', $this->session->userdata('id'));
		return ($this->db->get('projects'))->result();
	}

}

?>