<?php
class TutorController extends Controller {


	public function index(){
		if(isset($_SESSION['userId'])){
			$this->view('Tutor/index');
		}
		else
			header('location:/');
			
	}
	
	public function create() {
		if(isset($_SESSION['userId'])){
			$this->view('Tutor/create');
		}
		else
			header('location:/');
	}

	public function _create() {
		if(isset($_SESSION['userId'])){
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
		else
			header('location:/');
	}


	//Deletes tutor account/profile info
	public function delete() {

	}

	public function _delete() {
		
	}

	public function search() {
		if($_SESSION['userId'] != null)
		{		
			$subject = $_GET['search'];
			$tutor = $this->model('Tutor');
		
			$tutors = $tutor->getTutors($subject);		
			$program = $this->model('Program');
			$programs = $program->getPrograms();	
		
			$this->view('Tutor/search', ['tutors'=>$tutors, 'programs'=>$programs]);
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
			
			$tutors = $tutor->getTutors($subject, $program, $price_lower, $price_upper);	

			$program = $this->model('Program');
			$programs = $program->getPrograms();			
			
			$this->view('Tutor/search', ['tutors'=>$tutors, 'programs'=>$programs]);
		}
		else
			header('location:/');
		
	}
}
?>