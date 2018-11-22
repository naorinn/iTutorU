<?php

class NotesController extends Controller{


	public function index() {
		if($_SESSION['userId'] != null)
		{
			$note = $this->model('Notes');
			$notes = $note->getNotes($_SESSION['userId']);
			$this->view('Notes/index', ['notes'=>$notes]);
		}
		else
			header('location:/');
	}

	
	

}
?>