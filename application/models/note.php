<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Note extends CI_Model
{

	function get_all()
	{
		return $this->db->query("SELECT message FROM messages")->result_array();
	}
	function add_note($post)
	{
		$query = "INSERT INTO messages (message, created_at, updated_at, user_id) 
				VALUES (?, now(), now(), 1)";
		return $this->db->query($query, array($post));
	}


}