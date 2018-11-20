<?php

class NoteController extends Controller{
	public function index() {
		if($_SESSION['userId'] != null)
		{
			$this->view('Notes/index');
		}
		else
			header('location:/');
	}

}
?>