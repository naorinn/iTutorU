<?php
class ThreadController extends Controller{

	public function index() {
		$thread = $this->model('Thread');
		$threads = $thread->getUserThreads($_SESSION['userId']);
		$this->view('Thread/index', ['threads'=>$threads]);
	}


}


?>