<?php
class Load_more_model extends CI_Model
{
 function fetch_data($limit, $start)
 {

  $this->db->select("*");
  $this->db->from("post");
  $this->db->order_by("id", "DESC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query;
 }
}
?>
