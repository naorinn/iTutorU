<?php

class ProfileController extends Controller{

	public function index() {
		$this->view('Profile/index');
	}

	public function create() {
		$this->view('Profile/create', ['profileImage'=>'/images/profile-default.jpg']);
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