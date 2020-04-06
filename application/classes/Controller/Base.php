<?php

abstract class Controller_Base extends Controller_Template {
	
	public $template = "Base";
	
	public function before()
	{
		parent::before();
		View::set_global("title", "Little Blog Classical Web App Example");
		View::set_global("description", "Ko7 Based Site");
		$this->template->styles = array('bootstrap.min');
		$this->template->content = "";
	}
	
}

?>