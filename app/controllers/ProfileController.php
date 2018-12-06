<?php

class ProfileController extends Controller{
	public function index() {
		if(isset($_SESSION['userId'])){
			//$user = $this->model('User');
			//$selected_user = $user->getUserById($_SESSION['userId']);
		
			header('location:/User/home');
		}
		else
			header('location:/');
	}

	public function create() {
		if(isset($_SESSION['userId'])){
			$user = $this->model('User');
			$user->userId = $_SESSION['userId'];
			if(!$user->hasProfile()){
			
				$school = $this->model('School');
				$schools = $school->getSchools();	

				$program = $this->model('Program');
				$programs = $program->getPrograms();
				$profile = $this->model('Profile');
					
				$this->view('Profile/create', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools, 'programs'=>$programs]);
			}
			else
				header('location:/Profile/edit');
		}
		else
			header('location:/');
	}

		
	

	public function _create() {
		if(isset($_SESSION['userId'])){
			if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['school']) && isset($_POST['program'])){
				$profile = $this->model('Profile');				

				$profile->userId = $_SESSION['userId'];
				$profile->firstName = $_POST['firstName'];
				$profile->lastName = $_POST['lastName'];
				$profile->schoolId = $_POST['school'];
				$profile->programId = $_POST['program'];
				$profile->insert();
				header('location:/User/home');
			}
			else{
				$this->view('Profile/create', ['e_profile_create'=>'Please enter all required information.']);
			}		
		}
		else
			header('location:/');
	}


	public function edit() {
		if(isset($_SESSION['userId'])){		
			$school = $this->model('School');
			$schools = $school->getSchools();	

			$profile = $this->model('Profile');
			$current_profile = $profile->getProfileByUserId($_SESSION['userId']);

			$program = $this->model('Program');
			$programs = $program->getPrograms();	
			$this->view('Profile/edit', ['schools'=>$schools, 'programs'=>$programs, 'profile'=>$current_profile]);
		}
		else
			header('location:/');

	}

	public function _edit() {
		if(isset($_SESSION['userId'])){
			if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['school']) && isset($_POST['program'])){
				$profile = $this->model('Profile');					

				$profile->userId = $_SESSION['userId'];
				$profile->firstName = $_POST['firstName'];
				$profile->lastName = $_POST['lastName'];
				$profile->schoolId = $_POST['school'];
				$profile->programId = $_POST['program'];
				$profile->update();			
				
				$message = "Profile updated successfully!";
				$this->view('Default/status', ['message'=>$message]);
			}		
		}
		else
			header('location:/');
	}


	public function detail($tutorId) {
		if(isset($_SESSION['userId'])){
			$tutor = $this->model('Tutor');
			$selected_tutor = $tutor->getTutorById($tutorId);
			
			$this->view('Profile/detail', ['tutor'=>$selected_tutor]);
		}
		else
			header('location:/');

	}

	public function updateProfileImage() {
		if(isset($_SESSION['userId'])){
			$this->view('Profile/profileImage', ['profileImagePath'=>'/images/profile_default.jpg']);
		}
		else
			header('location:/');
	}

	public function _updateProfileImage() {
		if(isset($_SESSION['userId'])){
			if(true){
				$file_name = helpers::imageUpload('profileImagePath');
				
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
		else
			header('location:/');

	}

	

}

?>