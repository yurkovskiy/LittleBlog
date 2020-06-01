<?php
class Controller_Api_Posts extends Controller_REST {
	
	public function action_index()
	{
		$Posts = ORM::factory("Post")->find_all();
		if (empty($Posts))
		{
			$this->rest_output();
		}
		else
		{
			$result = array();
			foreach ($Posts as $Post) {
				array_push($result, array(
				'id' => $Post->id,
				'title' => $Post->title,
				'author' => $Post->author,
				'post_date' => $Post->post_date,
				'message' => $Post->message
				));
			}
			$this->rest_output($result);
		}
	}
	
	public function action_delete()
	{
		$code = 200;
		$message = "";
		if (empty($this->request->param('id'))) {
			$this->rest_output(array(
					'error' => 'id parameter should be present in the URI'
			), 400);
		}
		else
		{
			$record = ORM::factory("Post", $this->request->param("id"));
			if ($record->loaded())
			{
				$record->delete();
				$message = "The Post #{$this->request->param("id")} has been deleted successfully";
			}
			else
			{
				$code = 400;
				$message = "The Post #{$this->request->param("id")} cannot be deleted because absent";
			}
			$this->rest_output(array(
					'message' => $message
			), $code);			
		}
	}
	
}

?>