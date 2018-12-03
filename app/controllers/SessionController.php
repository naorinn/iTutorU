<?php
class SessionController extends Controller {

	public function index() {
		if(isset($_SESSION['userId'])){

		}
		else
			header('location:/');
	}

	public function edit($sessionId) {
		if(isset($_SESSION['userId'])){
			$session = $this->model('Session');
			$session->userId = $_SESSION['userId'];
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
		
	}

}

?>