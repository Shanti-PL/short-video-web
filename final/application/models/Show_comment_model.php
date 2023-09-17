<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Show_comment_model extends CI_Model {
	
	public function viewaction()
    {
        $query = $this->db->select('*')->from('comments')->get();
        return $query->result();
    }
	
}