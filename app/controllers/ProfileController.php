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

		//if(isset($_POST['action'])){
			//$file_name = helpers::imageUpload('profileImagePath');
			$profile = $this->model('Profile');
			//$profile->profileImagePath = $file_name;
			//$profile->changeProfilePic();
			//redirect
			$this->view('Profile/create', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools, 'programs'=>$programs]);
		//}else{
			//$this->view('Profile/addProfilePic');
		//}

	}

		//$this->view('Profile/create', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools, 'programs'=>$programs]);
	

	public function _create() {
		if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['school']) && isset($_POST['program'])){
			$profile = $this->model('Profile');
			$user = $this->model('User');
			//$current_user = $user->getUserById($id);
			//var_dump($_SESSION['userId']);

			$profile->userId = $_SESSION['userId'];
			$profile->firstName = $_POST['firstName'];
			$profile->lastName = $_POST['lastName'];
			$profile->schoolId = $_POST['school'];
			$profile->programId = $_POST['program'];

			//$profileImage = $_POST['profileImagePath'];
			
			
			$profile->insert();

			//echo "profile created";

			$this->view('User/home');
		}
		else{
			$this->view('Profile/create', ['e_profile_create'=>'Please enter all required information.']);
		}
		if(isset($_POST['profileImage'])){
			echo 'prof image';
		}
	}

	public function edit() {
		$school = $this->model('School');
		$schools = $school->getSchools();	

		$program = $this->model('Program');
		$programs = $program->getPrograms();	
		$this->view('Profile/edit', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools, 'programs'=>$programs]);
	}

	public function _edit() {

	}

	public function updateProfileImage() {
		$this->view('Profile/profileImage', ['profileImage'=>'/images/profile_default.jpg']);
	}

	public function _updateProfileImage() {

		if(isset($_POST['action'])){
			$file_name = helpers::imageUpload('profileImagePath');
			$profile = $this->model('Profile');
			$profile->profileImagePath = $file_name;
			$profile->changeProfilePic();
			//redirect
			header('location:/Profile/create/', ['profile' => $profile]);
		}else{
			$this->view('Profile/addProfilePic');
		}

	}
	

}

?>