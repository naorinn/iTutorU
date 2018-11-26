<?php
class RequestController extends Controller {

	public function index() {
		$user = $this->model('User');
		if($user->isTutor()){
			//get requests sent to me
			$request = $this->model('Request');
			$received_requests = $request->getReceivedRequests();
			//var_dump($received_requests);
		}

		//get request made by me
		$this->view('Request/index', ['received_requests'=>$received_requests]);
	}

	public function create($tutorId) {
		if($_SESSION['userId'] != null){
			$tutor = $this->model('Tutor');
			$selected_tutor = $tutor->getTutorById($tutorId);
			$this->view('Request/create', ['tutor'=>$selected_tutor]);
		}
		else
			header('location:/');
	}

	public function _create() {
		//$val = $_POST['tutorId'];
		try{
			$request = $this->model('Request');
			$request->userId = $_SESSION['userId'];
			$request->tutorId = $_POST['tutorId'];
			$request->request_date = $_POST['date'];
			$request->request_time = $_POST['time'];
			$request->details = $_POST['details'];

			$request->insert();

			$message = "Tutoring request sent successfully!";	
			//header('location:/User/home');	//message does not display when url is rebased
			$this->view('User/home', ['message'=>$message]);
		}
		catch(Exception $e) {

		}
		
	}

}
?>