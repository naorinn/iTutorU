<?php

class NotesController extends Controller{


	public function index() {
		if(isset($_SESSION['userId'])){
			$note = $this->model('Note');
			$notes = $note->getNotes($_SESSION['userId']);
			$this->view('Notes/index', ['notes'=>$notes]);

		}
		else
			header('location:/');
	}

	
	public function create() {
		if(isset($_SESSION['userId'])){
			$this->view('Notes/create');
		}
		else
			header('location:/');
	}


	public function _create() {
		if(isset($_SESSION['userId'])){
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
			$this->view('Default/status', ['message'=>$message]);
		}
		else
			header('location:/');

		
	}

	


	public function delete($noteId) {
		if(isset($_SESSION['userId'])) {
			$note = $this->model('Note');
			$selected_note = $note->getNoteById($noteId);

			$this->view('Notes/delete', ['note'=>$selected_note]);
		}
		else
			header('location:/');

	}


	public function _delete($noteId) {
		if(isset($_SESSION['userId'])){
			$note = $this->model('Note');
			$note->noteId = $noteId;
			$note->delete();
			$message = "Note deleted successfully.";
			$this->view('Default/status', ['message'=>$message]);
		}
		else
			header('location:/');

	}


	public function edit($noteId) {
		if(isset($_SESSION['userId'])){
			$note = $this->model('Note');
			$selected_note = $note->getNoteById($noteId);
			$this->view('Notes/edit', ['note'=>$selected_note]);
		}
		else
			header('location:/');

	}

	public function _edit($noteId) {
		if(isset($_SESSION['userId'])){
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
			
			$this->view('Default/status', ['message'=>$message]);
		}
		else
			header('location:/');

	}


	public function search() {
		if(isset($_SESSION['userId'])){
			$searchWord = $_GET['search'];
			$note = $this->model('Note');
			
			$notes = $note->getNotes($_SESSION['userId'], $searchWord);
			
			$this->view('Notes/index', ['notes'=>$notes]);

		}
		else
			header('location:/');
	}

}
?>