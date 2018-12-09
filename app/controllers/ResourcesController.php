<?php
class ResourcesController extends Controller {
	
	public function index() {
		if(isset($_SESSION['userId'])){
			$resource = $this->model('Resource');
			$resources = $resource->getResources();
			$program = $this->model('Program');
			$programs = $program->getPrograms();	
			
			$this->view('Resources/index', ['resources'=>$resources, 'programs'=>$programs]);
		}
		else
			header('location:/');
	}

	public function create(){
		if(isset($_SESSION['userId'])){
			$program = $this->model('Program');
			$programs = $program->getPrograms();
			$this->view('Resources/create', ['programs'=>$programs]);
		}
		else 
			header('location:/');
	}

	public function _create(){
		try {
			if(isset($_SESSION['userId'])){
				$resource = $this->model('Resource');
				$resource->resourceName = $_POST['name'];
				$resource->description = $_POST['description'];
				$resource->source = $_POST['source'];

				$resId = $resource->insert();
				
				
				$resourceProgram = $this->model('ResourceProgram');
				$programs = explode(",", $_POST['programs']);
				if(count($programs) > 0){
					foreach($_POST['programs'] as $program){	
						$resourceProgram->programId = $program;
						$resourceProgram->resourceId = $resId;				
						$resourceProgram->insert();
					}
				}

				$message = "Resource added successfully!";
				$this->view('Default/status', ['message'=>$message]);
			}
			else
				header('location:/');
		}
		catch(Exceptin $e){

		}
			

	}

	public function search() {
		if(isset($_SESSION['userId'])){$search = $_GET['subject'];
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