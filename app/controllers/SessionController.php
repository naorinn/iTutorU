<?php
class SessionController extends Controller {

	public function index() {
		header('location: /User/home');
	}
	

	public function edit($sessionId) {
		if(isset($_SESSION['userId'])){
			$session = $this->model('Session');
			$session->userId = $_SESSION['userId'];
			$session->sessionId = $sessionId;
			$selected_session = $session->getSessionById();			
			$this->view('Session/edit', ['session'=>$selected_session]);
		}
		else
			header('location:/');
	}

	public function _edit() {

	}

	public function delete($sessionId) {
		if(isset($_SESSION['userId'])){
			$session = $this->model('Session');
			$session->sessionId = $sessionId;
			$session->userId = $_SESSION['userId'];
			$selected_session = $session->getSessionById();
			
			$this->view('Session/delete', ['session'=>$selected_session]);
		}
		else
			header('location:/');
	}

	public function _delete() {
		if(isset($_SESSION['userId'])){
			$session = $this->model('Session');
			$session->sessionId =  $_POST['sessionId'];
			$session->userId = $_SESSION['userId'];
			$session->delete();
			$message = "Session deleted successfully.";
			
			header('location:/User/home');
		}
		else 
			header('location:/');
	}

}

?>