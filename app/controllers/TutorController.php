<?php
class TutorController extends Controller {


	public function index(){

		$this->view('Tutor/index');
			
	}
	
	public function create() {
		$this->view('Tutor/create');
	}

	public function _create() {
		if(isset($_POST['description']) && isset($_POST['about']) && isset($_POST['pay'])){
			$tutor = $this->model('Tutor');
			$tutor->userId = $_SESSION['userId'];
			$tutor->description = $_POST['description'];
			$tutor->pay = $_POST['pay'];
			//$tutor->about = $_POST['about'];
			$tutor->insert();
			$this->view('User/home', ['message'=>"Your tutor profile was created successfully! Congratulations!"]);
		}
	}


	//Deletes tutor account/profile info
	public function delete() {

	}

	public function _delete() {
		
	}

	public function search() {
		if($_SESSION['userId'] != null)
		{		
			//var_dump($_GET['searchSubject']);
			$search_key = $_GET['search'];
			$tutor = $this->model('Tutor');
			$tutors = $tutor->getTutors($search_key);	

			$program = $this->model('Program');
			$programs = $program->getPrograms();	
		
			$this->view('Tutor/search', ['tutors'=>$tutors, 'programs'=>$programs]);
			

			//$program = $this->model('Program');
			//$programs = $program->getPrograms();	
			//$this->view('Tutor/search', []);
		}
		else
			header('location:/');
		
	}

	public function advancedSearch() {
		if($_SESSION['userId'] != null)
		{		
			$subject = $_GET['subject'];
			$program = $_GET['program'];
			$price_lower = $_GET['price'];
			$price_upper = $_GET['price_upper'];
			

			$tutor = $this->model('Tutor');
			
			$tutors = $tutor->getTutorsAdvancedSearch($subject, $program, $price_lower, $price_upper);	

			$program = $this->model('Program');
			$programs = $program->getPrograms();	
		
			header('location:/Tutor/search');
			$this->view('Tutor/search', ['tutors'=>$tutors, 'programs'=>$programs]);
		}
		else
			header('location:/');
		
	}
}
?>