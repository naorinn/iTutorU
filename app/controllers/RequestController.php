<?php
class RequestController extends Controller {
	public function create($tutorId) {

		$tutor = $this->model('Tutor');
		$selected_tutor = $tutor->getTutorById($tutorId);
		$this->view('Request/create', ['tutor'=>$selected_tutor]);
	}

	public function _create() {
		$val = $_POST['tutor'];
		var_dump($val);
	}

}
?>