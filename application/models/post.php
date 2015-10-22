<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Model {
	public function all_posts(){
		$query = "SELECT id, title, description FROM posts ORDER BY id DESC";
        return $this->db->query($query)->result_array();
	}
	public function new_post($note, $title){
		$query = "INSERT INTO posts (title, description, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
        $values = array($title, $note); 
        $this->db->query($query, $values);
        $id = $this->db->insert_id();
        return $this->db->query("SELECT id, title, description FROM posts WHERE id = ?", $id)->row_array();
	}
    public function delete($id){
        $query = "DELETE FROM posts WHERE id = ?";
        $this->db->query($query, $id);
    }
	public function update_post($id, $note, $title){
		$query = "UPDATE posts SET title = ?, description = ?, updated_at = NOW() WHERE id = ?";
        $values = array($title, $note, $id); 
        $this->db->query($query, $values);
        return $this->db->query("SELECT id, title, description FROM posts WHERE id = ?", $id)->row_array();
    }
}