<?php

class ProfileController extends Controller{

	public function index() {
		$this->view('Profile/index');
	}

	public function create() {
		$schools = ["Vanier College", "Dawson College", "Marian"];

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