<?php 
//dos not interact with DB; model does
	class DefaultController extends Controller{

		public function index() {
				$this->view('Default/404');
		}
		
		public function status($message = ''){
			$this->view('Default/status', ['message'=>$message]);
		}
	}

?>