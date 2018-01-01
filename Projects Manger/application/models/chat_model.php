<?php 


class chat_model extends CI_Model{

	public function last_id(){
		return $this->db->select_max('id')->get("chat")->row()->id;
	}
    public function insert($message){
		$this->db->insert("chat",$message);
		$this->session->set_userdata('message_id',$this->db->insert_id()) ;
		$this->db->cache_delete();
	}

	public function get_news(){

if ($this->session->userdata('message_db') < $this->session->userdata('message_id')){
			$this->db->select('users.username,chat.message,chat.time,chat.id')->order_by('chat.id',"desc");
			$this->db->from('chat');
			$this->db->join("users","users.id = chat.user_id");
			$this->db->where('chat.id >', $this->session->userdata('message_db'));
			$this->db->where('chat.id <=', $this->session->userdata('message_id'));
		$result = $this->db->get();
		  $result = $result->result_array();
		  $this->db->cache_delete();
		 return $result;
		 }
		
	}

	public function get(){
		$message_id = $this->db->select('id')->from('chat')->order_by('chat.id','desc')->limit(1)->get()->row()->id;
		$this->session->set_userdata('message_db',$message_id);
		$this->db->select('users.username,chat.message,chat.time,chat.id');
		$this->db->from('chat')->order_by('chat.id','desc')->limit(50);
		$this->db->join("users","users.id = chat.user_id");
		$result = $this->db->get();
		return array_reverse($result->result());
		$this->db->cache_delete();
		/*if($result->num_rows() >= 10){
			$this->db->where('id>', 1);
			$this->db->delete('chat');
			$data = array(
			  "message" => "welcome to chat room"	,//$this->input->post('message'),
			  "user_id" => 1,
			  "time" => time()
				);
	$this->db->insert("chat",$data);
		 }*/
		 
		
	}
	public function users(){
		$this->db->select('id,username');
		$this->db->from('users');
		$result =$this->db->get();

		return $result->result_array();
	}
}



 ?>