<?php

class Controller extends ModelCaller
{
	
	
	public function view($view, $data = []) {
		if(file_exists('app/views/' . $view . '.php')) {
			require_once 'app/views/' . $view . '.php';
		}
		else echo "Cannot load view $view: file not found!";
	}
}
?>