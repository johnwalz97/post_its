<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function index(){
		$posts = $this->post->all_posts();
		$this->load->view('welcome_message', ['posts'=>$posts]);
	}
	public function create(){
		$note = $this->input->post('description');
		$title = $this->input->post('title');
		$post = $this->post->new_post($note, $title);
		$title = $post['title'];
		$description = $post['description'];
		$id = $post['id'];
		echo "<form class='panel' id='$id'><div class='panel-heading'><span class='add'>&#10010</span><input class='panel-input title_form' name='title' value='$title'><span class='delete'>&#10008</span></div><div class='panel-body'><textarea name='description' class='note update'>$description</textarea></div></form>";
	}
	public function delete($id){
		$this->post->delete($id);
	}
	public function update($id){
		$note = $this->input->post('description');
		$title = $this->input->post('title');
		$post = $this->post->update_post($id, $note, $title);
		$title = $post['title'];
		$description = $post['description'];
		$id = $post['id'];
		echo "<form class='panel' id='$id'><div class='panel-heading'><span class='add'>&#10010</span><input class='panel-input title_form' name='title' value='$title'><span class='delete'>&#10008</span></div><div class='panel-body'><textarea name='description' class='note update'>$description</textarea></div></form>";
	}
}
