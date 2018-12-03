<?php
class MessageController extends Controller {
	public function index() {
		if(isset($_SESSION['userId'])){
			header('location:/Thread/index');
		}
		else
			header('location:/');
	}

	public function _create($threadId) {
		if(isset($_SESSION['userId'])){
			if(isset($_POST['message'])){
				$text = $_POST['message'];
				$message = $this->model('Message');
				$message->messageText = $text;
				$message->threadId = $threadId;
				$message->senderId = $_SESSION['userId'];
				$message->insert();

			}
			header('location: /Thread/detail/1');
		}
		else
			header('location:/');
	}

}
?>
