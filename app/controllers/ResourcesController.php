<?php
class ResourcesController extends Controller {
	
	public function index($message = '') {
		$resource = $this->model('Resource');
		$resources = $resource->getResources();
		$program = $this->model('Program');
		$programs = $program->getPrograms();	
		//header('location:/Resources/index');
		$this->view('Resources/index', ['resources'=>$resources, 'message'=>$message, 'programs'=>$programs]);
	}

	public function create(){
		$program = $this->model('Program');
		$programs = $program->getPrograms();
		$this->view('Resources/create', ['programs'=>$programs]);
	}

	public function _create(){
		$resource = $this->model('Resource');
		$resource->resourceName = $_POST['name'];
		$resource->description = $_POST['description'];
		$resource->source = $_POST['source'];

		$resId = $resource->insert();
		
		
		$resourceProgram = $this->model('ResourceProgram');
		$programs = $_POST['programs'];
		if(count($programs) > 0){
			foreach($_POST['programs'] as $program){	
				$resourceProgram->programId = $program;
				$resourceProgram->resourceId = $resId;				
				$resourceProgram->insert();
			}
		}

		$message = "Resource added successfully!";
		$this->index($message);
		//header('location:/Resources/index')
		//$this->view('Resources/index', ['message'=>$message]);

	}

	public function search() {
		if($_SESSION['userId'] != null)
		{		
			$search = $_GET['subject'];
			$program = $_GET['program'];
			
			

			$resource = $this->model('Resource');
			
			$resources = $resource->getResources($search, $program);	

			$program = $this->model('Program');
			$programs = $program->getPrograms();			
			
			$this->view('Resources/index', ['resources'=>$resources, 'programs'=>$programs]);
		}
		else
			header('location:/');
	}


}

?>