<?php

class NotesController extends Controller{


	public function index($message = '') {
		if($_SESSION['userId'] != null)
		{
			$note = $this->model('Note');
			$notes = $note->getNotes($_SESSION['userId']);
			$this->view('Notes/index', ['notes'=>$notes, 'message'=>$message]);
		}
		else
			header('location:/');
	}

	
	public function create() {
		if($_SESSION['userId'] != null)
		{
			$this->view('Notes/create');
		}
		else
			header('location:/');
	}


	public function _create() {
		if(isset($_POST['noteText'])){
			$note = $this->model('Note');
			$note->noteText = $_POST['noteText'];

			$nId = $note->insert();
			
			
			$usernote = $this->model('Usernote');
			
			$usernote->userId = $_SESSION['userId'];
			$usernote->noteId = $nId;				
			$usernote->insert();
	}

		$message = "Note created successfully!";
		$this->index($message);

		}

	


	public function delete() {
		if($_SESSION['userId'] != null)
		{
			$this->view('Notes/delete');
		}
		else
			header('location:/');

	}


	public function _delete() {


	}


	public function edit() {
		if($_SESSION['userId'] != null)
		{
			$this->view('Notes/edit');
		}
		else
			header('location:/');

	}

	public function _edit() {


	}


	public function search() {



	}

}
?>