<?php

class ProfileController extends Controller{

	public function index() {
		$this->view('Profile/index');
	}

	public function create() {
		$school = $this->model('School');
		$schools = $school->getSchools();	

		$program = $this->model('Program');
		$programs = $program->getPrograms();	
		$this->view('Profile/create', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools, 'programs'=>$programs]);
	}

	public function _create() {
		if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['school']) && isset($_POST['program'])){
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$school = $_POST['school'];
			$program = $_POST['program'];

			//$profileImage = $_POST['profileImagePath'];
			$profile = $this->model('Profile');
			$user = $this->model('User');
			$id = $_SESSION['userId'];
			$current_user = $user->getUserById($id);
			$profile->insert();

			echo "profile created";

			$this->view('User/home');
		}
		else{
			$this->view('Profile/create', ['e_profile_create'=>'Please enter all required information.']);
		}
		if(isset($_POST['profileImage'])){
			echo 'prof image';
		}
	}

	public function update() {

	}

	public function _update() {

	}

	public function updateProfileImage() {

	}

	public function _updateProfileImage() {

	}
	

}

?>