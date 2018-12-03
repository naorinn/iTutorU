<?php

class ProfileController extends Controller{

	


	public function index() {
		if($_SESSION['userId'] != null)
		{
			$user = $this->model('User');
			$selected_user = $user->getUserById($_SESSION['userId']);
		
			$this->view('Profile/index', ['user'=>$selected_tutor]);
		}
		else
			header('location:/');
	}

	public function create() {
		if($_SESSION['userId'] != null)
		{
			$school = $this->model('School');
			$schools = $school->getSchools();	

			$program = $this->model('Program');
			$programs = $program->getPrograms();
			$profile = $this->model('Profile');
				
			$this->view('Profile/create', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools, 'programs'=>$programs]);
		}
		else
			header('location:/');
	}

		
	

	public function _create() {
		if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['school']) && isset($_POST['program'])){
			$profile = $this->model('Profile');				

			$profile->userId = $_SESSION['userId'];
			$profile->firstName = $_POST['firstName'];
			$profile->lastName = $_POST['lastName'];
			$profile->schoolId = $_POST['school'];
			$profile->programId = $_POST['program'];
			$profile->insert();

			
			$this->view('User/home');

		}
		else{
			$this->view('Profile/create', ['e_profile_create'=>'Please enter all required information.']);
		}		
	}


	public function edit($message='') {
		if($_SESSION['userId'] != null)
		{		
			$school = $this->model('School');
			$schools = $school->getSchools();	

			$profile = $this->model('Profile');
			$current_profile = $profile->getProfileByUserId($_SESSION['userId']);

			$program = $this->model('Program');
			$programs = $program->getPrograms();	
			$this->view('Profile/edit', ['message'=>$message, 'schools'=>$schools, 'programs'=>$programs, 'profile'=>$current_profile]);
		}
		else
			header('location:/');

	}

	public function _edit() {
		if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['school']) && isset($_POST['program'])){
			$profile = $this->model('Profile');					

			$profile->userId = $_SESSION['userId'];
			$profile->firstName = $_POST['firstName'];
			$profile->lastName = $_POST['lastName'];
			$profile->schoolId = $_POST['school'];
			$profile->programId = $_POST['program'];
			$profile->update();			
			//header('location:/User/home');
			//$this->edit("Profile updated successfully!");
			$message = "Profile updated successfully!";
			$this->view('User/home', ['message'=>$message]);
		}
		//else{
		//	$this->view('Profile/create', ['e_profile_create'=>'Please enter all required information.']);
		//}		
	}


	public function detail($tutorId) {
		$tutor = $this->model('Tutor');
		$selected_tutor = $tutor->getTutorById($tutorId);
		
		$this->view('Profile/detail', ['tutor'=>$selected_tutor]);

	}

	public function updateProfileImage() {
		if($_SESSION['userId'] != null)
		{
			$this->view('Profile/profileImage', ['profileImagePath'=>'/images/profile_default.jpg']);
		}
		else
			header('location:/');
	}

	public function _updateProfileImage() {

		if(true){
			$file_name = helpers::imageUpload('profileImagePath');
			//var_dump($file_name);
			$profile = $this->model('Profile');
			$current_profile = $profile->getProfileByUserId($_SESSION['userId']);
			$current_profile->profileImagePath = $file_name;
			
			$current_profile->changeProfilePic($_SESSION['userId']);
			
			header('location:/Profile/edit');
		}
		else{
			$this->edit();
		}

	}

	

}

?>