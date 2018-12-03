<?php
class UserController extends Controller {


	public function index(){

			$this->view('User/index');
			
	}
	
	public function login() {
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = $this->model('User');
			$current_user = $user->getUserByUsername($username);
			
			if($current_user != null){				
				if(password_verify($password, $current_user->password)){					
					$_SESSION['username'] = $username;
					$_SESSION['userId'] = $current_user->userId;
								
					header('location:/Session/home');

				}else{
					$this->view('User/index',['error'=>'Invalid username or password.']);
				}
			}
			else
			{
				$this->view('User/index',['error'=>'Invalid username or password.']);
			}		
		}
		else{
			$this->view('User/index',['error'=>'Please enter your username and password.']);
		}
	}

	public function logout(){
		$_SESSION = array();

		session_destroy();
		header('location:/');
	}


	public function create() {
			
		$this->view('User/create');

	}
		

	public function _create(){
		if(isset($_POST['username'])){
			if(isset($_POST['password'])){
				if(isset($_POST['retypePassword']) && $_POST['password']==$_POST['retypePassword']){
					$user = $this->model('User');
					$user->username = $_POST['username'];
					$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);	
					
					$current_user = $this->model('User');
					$existingUser = $current_user->getUserByUsername($_POST['username']);

					if($existingUser == false){		
						
						$user->insert();
						//$verifyUser = $user->getUserByUsername($username);
						$_SESSION['userId'] = $user->lastInsertId();

						$_SESSION['username'] = $user->username;
//						$_SESSION['userId'] = $verifyUser->userId;
						header('location:/Profile/create');
						
					} else {
						$this->view('User/create', ['create_error' => 'The username you have entered is already in the database.']);
					}
				}
				else{
					$this->view('User/create', ['create_error'=>'Please retype your password correctly.']);
				}
			}
			else{
				$this->view('User/create', ['create_error'=>'Please enter a valid password.']);
			}
			
		}else{
			$this->view('User/create', ['create_error'=>'Please enter a valid username.']);
		}

	}


	public function home() {
		if($_SESSION['userId'] != null)
		{
			$session = $this->model('Session');
			$session->userId = $_SESSION['userId'];
			$session->tutorId = $_SESSION['userId'];
			$user_sessions = $session->getUserSessions();

			$tutor_sessions = [];

			$user = $this->model('User');
			if($user->isTutor()){
				$tutor_sessions = $session->getTutorSessions();
			}

			$sessions = $session->getSessions();

			$this->view('User/home', ['user_sessions'=>$user_sessions, 'tutor_sessions'=>$tutor_sessions, 'sessions'=>$sessions]);
		}
		else
			header('location:/');
	}


	private function validateInput($username, $pass) {
			//https://regexone.com/references/php
			//http://php.net/manual/en/function.password-hash.php
			$usernameRegex = "/^[0-9]{7}$/";
			$passwordRegex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%.*?&_])[A-Za-z\d@$!%*\_\.?&]{8,}$";
			$valid = false;

			if(preg_match($usernameRegex, $username))
			{
				$valid = true;
			}
			else{
				$message = "Your username is your school ID";
				$this->view('Default/create', ['message'=>$message]);
				$valid = false;
			}

			if(preg_match($passwordRegex, $pass)){
				$valid = true;
			}
			else{
				$message = "Your password must be 8 characters long, contain at least one uppercase, contain at least one lowercase, contain at least one number, contain at least one special character";
				$this->view('Default/create', ['message'=>$message]);
				$valid = false;
			}
			return $valid;
	}

	
}
?>