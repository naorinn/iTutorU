<?php

class SearchController extends Controller{

	public function index() {
		if($_SESSION['userId'] != null)
		{
			$this->view('Search/index');
		}
		else
			header('location:/');
	}


	

}

?>