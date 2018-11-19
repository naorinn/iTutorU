<?php
class TutorController extends Controller {


	public function index(){

		$this->view('Tutor/index');
			
	}
	
	public function create() {
		$this->view('Tutor/create');
	}

	public function _create() {
		
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
			$tutor = $this->model('Tutor');
			$tutors = $tutor->getTutors();	

			$this->view('Tutor/search', ['tutors'=>$tutors]);


			//$program = $this->model('Program');
			//$programs = $program->getPrograms();	
			//$this->view('Tutor/search', []);
		}
		else
			header('location:/');
		
	}
}
?>