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
			header('location:/Notes/index');

		}

		$message = "Note created successfully!";
		$this->index($message);

		
	}

	


	public function delete($noteId) {
		if($_SESSION['userId'] != null)
		{
			$note = $this->model('Note');
			$selected_note = $note->getNoteById($noteId);

			$this->view('Notes/delete', ['note'=>$selected_note]);
		}
		else
			header('location:/');

	}


	public function _delete($noteId) {
		if($_SESSION['userId'] != null)
		{
			$note = $this->model('Note');
			$note->noteId = $noteId;
			$note->delete();
			$message = "Note deleted successfully.";
			$this->index($message);
		}
		else
			header('location:/');

	}


	public function edit($noteId) {
		if($_SESSION['userId'] != null)
		{
			$note = $this->model('Note');
			$selected_note = $note->getNoteById($noteId);
			$this->view('Notes/edit', ['note'=>$selected_note]);
		}
		else
			header('location:/');

	}

	public function _edit($noteId) {
		if(isset($_POST['noteText'])){
			$note = $this->model('Note');
			$note->noteId = $noteId;
			$note->noteText = $_POST['noteText'];

			$note->update();
			//header('location:/Notes/index');
			$message = "Note updated successfully!";

		}
		else{
			$this->_delete($noteId);
			$message = "Empty note was deleted";
		}
		
		$this->index($message);

	}


	public function search() {



	}

}
?>