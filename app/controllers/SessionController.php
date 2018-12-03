<?php
class SessionController extends Controller {

	public function home() {
		if(isset($_SESSION['userId'])){
			$session = $this->model('Session');
			$session->userId = $_SESSION['userId'];
			$session->tutorId = $_SESSION['userId'];
			$user_sessions = $session->getUserSessions();

			$tutor_sessions = [];

			$user = $this->model('User');
			if($user->isTutor()){
				$tutor_sessions = $session->getTutorSessions();
			}

			$sessions = $session->getSessions();

			$this->view('User/home', ['user_sessions'=>$user_sessions, 'tutor_sessions'=>$tutor_sessions, 'sessions'=>$sessions]);

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