<?php

class Controller_Posts extends Controller_Base {
	
	public function action_index()
	{
		$content = View::factory("Posts");
		$content->posts = ORM::factory("Post")->find_all();
		$this->template->content = $content;
	}
	
	public function action_delete()
	{
		ORM::factory("Post", $this->request->param("id"))->delete();
		$this->redirect("Posts");
	}
	
	public function action_add()
	{
		$this->template->content = View::factory("AEPost");
	}
	
	public function action_edit()
	{
		$content = View::factory("AEPost");
		$post = ORM::factory("Post", $this->request->param("id"));
		$content->title = $post->title;
		$content->author = $post->author;
		$content->post_date = $post->post_date;
		$content->id = $post->id;
		$content->message = $post->message;
		$this->template->content = $content;
	}
	
	public function action_register()
	{
		$newPost = null;
		if ($this->request->post("id") !== null) {
			$newPost = ORM::factory("Post", $this->request->post("id"));
		} else {
			$newPost = ORM::factory("Post");
		}
		$newPost->title = $this->request->post("title");
		$newPost->author = $this->request->post("author");
		$newPost->message = $this->request->post("message");
		$newPost->post_date = date("Y-m-d H:i:s");
		$newPost->save();
		$this->redirect("Posts");
	}
	
}

?>