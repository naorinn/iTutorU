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


}


?>