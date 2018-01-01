<?php 

class Tasks_model extends CI_Model{


	public function display($id = null){
		$this->db->select('tasks.id,tasks.project_id,tasks.task_name,tasks.task_body,projects.user_id,tasks.date');
		$this->db->from('tasks');
		$this->db->join('projects', 'projects.project_id = tasks.project_id');
		if(!is_null($id)){
			$this->db->where('id', $id);
		}
		return  ($this->db->get())->result();
	}

	public function insert($data){
		return $this->db->insert('tasks', $data);
	}

	public function update($task_id,$data){
		$this->db->where('id', $task_id);
		return  $this->db->update('tasks',$data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete("tasks");
	}
	public function project_name($id){
		$this->db->where('project_id',$id);
		$result = $this->db->get('projects');
		return  $result->row();
	}
	public function user_create($id){
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('id', $id);
		$result =  $this->db->get();
		return $result->row()->username;
	}
	public function task_user_id($id){
		$this->db->select('projects.user_id,tasks.project_id');
		$this->db->from('tasks');
		$this->db->join('projects', 'projects.project_id = tasks.project_id');
		$this->db->where("id",$id);
		$result =  $this->db->get();
		return  $result->row()->user_id;
	}

}

?>