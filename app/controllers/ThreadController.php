<?php
class ThreadController extends Controller{

	public function index() {
		$thread = $this->model('Thread');
		$threads = $thread->getUserThreads($_SESSION['userId']);
		$this->view('Thread/index', ['threads'=>$threads]);
	}

	public function detail($threadId) {
		$message = $this->model('Message');
		$messages = $message->getMessages($threadId);
		$this->view('Thread/detail', ['messages'=>$messages, 'threadId'=>$threadId]);
	}

	public function find($contactUserId) {
		$thread = $this->model('Thread');

		
		if($selected_thread == null) {	
			$thread->firstUserId = $_SESSION['userId'];
			$thread->secondUserId = $contactUserId;
			$thread->insert();
		}
		$selected_thread = $thread->find($_SESSION['userId'], $contactUserId);
		header("location:/Thread/detail/$selected_thread->threadId");
	}

}


?>