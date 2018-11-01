<?php 
//dos not interact with DB; model does
	class DefaultController extends Controller{

		public function index($name = 'John'){
			//echo 'in default controller';
			//$name = 'hello ther!';
			$client = $this->model('Client');
			
			/*$client->first_name = "John";
			$client->last_name = "Reese";
			$client->insert();*/

			$clients = $client->getAll(); 


			//$user = $this->model('User');

			//$this->view('Default/showClients', ['clients'=>$clients]);//uncomment this to follow in class


			$this->view('Default/index', ['first_name'=>$client->first_name, 'last_name'=>$client->last_name]);
			//$this->view('Default/index');
		}


		public function login(){
			if(isset($_POST['action']) && $_POST['action'] == 'Login'){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$user = $this->model('User');
				$users = $user->where('username','=',$username)->get();
				if(isset($users[0])){
					$user = $users[0];
					if(password_verify($password, $user->password_hash)){
						$_SESSION['role'] = $user->role;
						$_SESSION['username'] = $username;
						$_SESSION['user_id'] = $user->user_id;
						header('location:/Useful/place');
					}else{
						$this->view('Login/index',['error'=>'Invalid username or password.']);
					}
				}else
					$this->view('Login/index',['error'=>'Invalid username or password.']);
			}else
				$this->view('User/login');
		}
		/*public function login() {
			if(isset($_POST['username']) && isset($_POST['password'])){
				$user = $this->model('User');
				$currentUser = $user->find($_POST['username']);
				var_dump($currentUser);
				if($currentUser != null){
					if($currentUser->password == $_POST['password']){
						header('Location: ~/Home/index.php');

					}
					else{
						echo "wrong password";
					}
				}

			}
			//echo "username is " . $_POST['username'];

		}*/

		public function create() {
			
			$this->view('Default/create');

		}


		public function _create(){
			//header('Location: https://login.yahoo.com/account/create?specId=yidReg');

			//operations to register (add user) then redirect to create profile
			
			if(isset($_POST['username']) && isset($_POST['password'])) {
				//$username = 
				//validateInput();
				if($_POST['password'] == $_POST['retypePassword']) {
					$user = $this->model('User');
					$user->username = $_POST['username'];
					$user->password = $_POST['password'];//password_hash($_POST['password'], 10);
					$user->insert();
				}
				else{
					$message = "Passwwords do not match!";
					$this->view('Default/create', ['message'=>$message]);
				}
			}
			
			
		}




		/*public function validateInput($username, $pass) {
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
			
		}*/



		/*public function showClient($client_id) {
			//$client = $this->model('Client')->find($client_id); OR
			$client = $this->model('Client');
			$client = $client->find($client_id);
			echo $client->first_name;
			$contacts = $client->getContacts();

			//$this->view('Default/showClient', ['client'=>$client, 'contacts'=>$contacts]);
		}*/
	}

?>