<?php
class ThreadController extends Controller{

	public function index() {
		if(isset($_SESSION['userId'])){
			$thread = $this->model('Thread');
			$threads = $thread->getUserThreads($_SESSION['userId']);
			$this->view('Thread/index', ['threads'=>$threads]);
		}
		else
			header('location:/');
	}

	public function detail($threadId) {
		if(isset($_SESSION['userId'])){
			$message = $this->model('Message');
			$messages = $message->getMessages($threadId);
			$this->view('Thread/detail', ['messages'=>$messages, 'threadId'=>$threadId]);
		}
		else 
			header('location:/');
	}

	public function find($contactUserId) {
		if(isset($_SESSION['userId'])){
			$thread = $this->model('Thread');
			
			if($selected_thread == null) {	
				$thread->firstUserId = $_SESSION['userId'];
				$thread->secondUserId = $contactUserId;
				$thread->insert();
			}
			$selected_thread = $thread->find($_SESSION['userId'], $contactUserId);
			header("location:/Thread/detail/$selected_thread->threadId");
		}
		else 
			header('location:/');
	}

}


?>