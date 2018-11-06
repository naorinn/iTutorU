<?php

class ProfileController extends Controller{

	public function index() {
		$this->view('Profile/index');
	}

	public function create() {
		$school = $this->model('School');
		$schools = $school->getSchools();
		$this->view('Profile/create', ['profileImage'=>'/images/profile_default.jpg', 'schools'=>$schools]);
	}

	public function _create() {

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