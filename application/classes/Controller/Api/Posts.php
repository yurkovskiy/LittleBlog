<?php
class Controller_Api_Posts extends Controller_REST {
	public function action_index() {
		$result = array();
		$Posts = null;
		
		
		if (!is_null($this->request->param("id"))) {
			$Posts = ORM::factory("Post", $this->request->param("id"));
			
			if ($Posts->loaded()) {
				array_push($result, array(
				'id' => $Posts->id,
				'title' => $Posts->title,
				'author' => $Posts->author,
				'post_date' => $Posts->post_date,
				'message' => $Posts->message,
				'tags' => $Posts->tags
				));
				
			}
		}
		
		else {
			$Posts = ORM::factory("Post")->find_all();
			foreach ( $Posts as $Post ) {
				array_push ( $result, array (
				'id' => $Post->id,
				'title' => $Post->title,
				'author' => $Post->author,
				'post_date' => $Post->post_date,
				'message' => $Post->message,
				'tags' => $Post->tags
				) );
			}
		}
		
		$this->rest_output ( $result );
	}
	public function action_delete() {
		$code = 200;
		$message = "";
		if (empty ( $this->request->param ( 'id' ) )) {
			$this->rest_output ( array (
					'error' => 'id parameter should be present in the URI' 
			), 400 );
		} else {
			$record = ORM::factory ( "Post", $this->request->param ( "id" ) );
			if ($record->loaded ()) {
				$record->delete ();
				$message = "The Post #{$this->request->param("id")} has been deleted successfully";
			} else {
				$code = 400;
				$message = "The Post #{$this->request->param("id")} cannot be deleted because absent";
			}
			$this->rest_output ( array (
					'message' => $message 
			), $code );
		}
	}
	public function action_create() {
		$data = json_decode ( $this->request->body () );
		$record = ORM::factory ( "Post" );
		$record->message = $data->message;
		$record->title = $data->message;
		$record->author = $data->author;
		$record->post_date = date ( "Y-m-d H:i:s" );
		$record->tags = $data->tags;
		$record->save ();
	}
}

?>