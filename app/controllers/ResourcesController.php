<?php
class ResourcesController extends Controller {
	
	public function index() {
		$resource = $this->model('Resource');
		$resources = $resource->getResources();
		$this->view('Resource/index', ['resources'=>$resources]);
	}

	public function create(){

	}

	public function _create(){
		
	}


}

?>