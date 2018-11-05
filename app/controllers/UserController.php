<?php
class UserController extends Controller {
	
	public function login() {
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = $this->model('User');
			$current_user = $user->getUser($username);
			//var_dump($current_user);
			if(isset($current_user)){
				//$current_user = $users[0];
				if(password_verify($password, $current_user->password)){					
					$_SESSION['username'] = $username;
					$_SESSION['userId'] = $current_user->userId;					
					header('location:/User/home');
				}else{
					echo "in else";//$this->view('Login/index',['error'=>'Invalid username or password.']);
				}
			}//else
				//$this->view('Login/index',['error'=>'Invalid username or password.']);
		//}else
			//$this->view('User/login');
		//}
		}
	}

	public function logout(){
		$_SESSION = array();

		session_destroy();
		header('location:/Default/index');
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
					try{
						$user->insert();
						header('location:/Default/index');
					}catch(Exception $e){
						$this->view('User/signup', ['errormessage' => 'The username you have entered is already in the database.']);
					}
				}
				else{
					$this->view('User/create', ['error'=>'Please retype your password correctly.']);
				}
			}
			else{
				$this->view('User/create', ['error'=>'Please enter a valid password.']);
			}
			
		}else{
			$this->view('User/create', ['error'=>'Please enter a valid username.']);
		}
	}


	public function home() {

		$this->view('User/home');
	}
}
?>