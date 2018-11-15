<?php
class TutorController extends Controller {


	public function index(){

			$this->view('Tutor/index');
			
	}
	
	public function create() {

	}

	public function _create() {
		
	}


	//Deletes tutor account/profile info
	public function delete() {

	}

	public function _delete() {
		
	}

	public function search() {

//		echo $searchTerm;
//		$array = json_decode(urldecode($searchTerm));
		var_dump($_GET['search']);
		/*if($_SESSION['userId'] != null)
		{		
			$tutor = $this->model('Tutor');
			$tutors = $tutor->getTutors();	

			$program = $this->model('Program');
			$programs = $program->getPrograms();	
			$this->view('Tutor/search', []);
		}
		else
			header('location:/');*/
		
	}
}
?>