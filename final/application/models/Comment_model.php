<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
 class Comment_model extends CI_Model{

    // upload file
    public function upload($comment, $username){

        $data = array(
            'comment' => $comment,
            'username' => $username
        );
        $query = $this->db->insert('comments', $data);

    }
    function fetch_data($query)
    {
        if($query == '')
        {
            return null;
        }else{
            $this->db->select("*");
            $this->db->from("comments");
            $this->db->like('comment', $query);
            $this->db->or_like('username', $query);
            $this->db->order_by('comment', 'DESC');
            return $this->db->get();
        }
    }
}