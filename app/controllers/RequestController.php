<?php
class RequestController extends Controller {

	public function index() {		
		if(isset($_SESSION['userId'])){
			$request = $this->model('Request');
			$received_requests = [];

			$user = $this->model('User');
			if($user->isTutor()){
				//get requests sent to me
				
				$request->tutorId = $_SESSION['userId'];
				$received_requests = $request->getReceivedRequests();
				//var_dump($received_requests);
			}
			$request->userId = $_SESSION['userId'];
			$sent_requests = $request->getSentRequests();

			//get request made by me
			$this->view('Request/index', ['received_requests'=>$received_requests, 'sent_requests'=>$sent_requests]);
		}
		else
			header('location:/');
	}

	public function create($tutorId) {
		if(isset($_SESSION['userId'])){
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
			if(isset($_SESSION['userId'])){
				$request = $this->model('Request');
				$request->userId = $_SESSION['userId'];
				$request->tutorId = $_POST['tutorId'];
				$request->request_date = $_POST['date'];
				$request->request_time = $_POST['time'];
				$request->details = $_POST['details'];

				$request->insert();

				$message = "Tutoring request sent successfully!";	
				//header('location:/User/home');	//message does not display when url is rebased
				$this->view('Default/status', ['message'=>$message]);
			}
			else
				header('location:/');
		}
		catch(Exception $e) {

		}
		
	}


	public function accept($requestId){
		if(isset($_SESSION['userId'])){
			$request = $this->model('Request');
			$request->requestId = $requestId;
			$request->status = "accepted";
			$request->updateStatus();		

			//Create a session
			$selected_request = $request->getRequest();
			$session = $this->model('Session');
			$session->userId = $selected_request->userId;
			$session->tutorId = $selected_request->tutorId;
			$session->session_date = $selected_request->request_date;
			$session->insert();

			$message = "Request accepted successfully.";
			$this->view('Default/status', ['message'=>$message]);
		}
		else
			header('location:/');
	}

	public function decline($requestId){
		if(isset($_SESSION['userId'])){
			$request = $this->model('Request');
			$request->requestId = $requestId;
			$request->status = "declined";
			$request->updateStatus();		
			$message = "Request declined successfully.";
			$this->view('Default/status', ['message'=>$message]);
		}	
		else
			header('location:/');
	}

	public function cancel($requestId){
		if(isset($_SESSION['userId'])){
			$request = $this->model('Request');
			$request->requestId = $requestId;
			$request->status = "cancelled";
			$request->updateStatus();		
			$message = "Request cancelled successfully.";
			$this->view('Default/status', ['message'=>$message]);
		}
		else
			header('location:/');
	}

}
?>