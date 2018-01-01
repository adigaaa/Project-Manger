<?php 

class users_model extends CI_Model{


	public function user_login($username,$password){
		
		$this->db->where("username",$username);
		//$this->db->where("password",$password);
		$result = $this->db->get("users");
		
		//if ($result->num_rows() == 1) {
		if (password_verify($password,$result->row()->password)) {
		    return 	$result->row(0)->id;
		}else{
			return false;
		}
	}

	public function get_users(){

		 $result = $this->db->get("users");
		return $result->result();
	}

	public function register(){
		$password_hash = password_hash($this->input->post("password"), PASSWORD_BCRYPT);
		$data = array(
			"username"=>$this->input->post("username"),
			"password"=>$password_hash,
			"first_name"=>$this->input->post("first_name"),
			"last_name"=>$this->input->post("last_name"),
			"email"=>$this->input->post("email"),
			);
		$result = $this->db->insert("users",$data);
		return $result;
	}
}


?>