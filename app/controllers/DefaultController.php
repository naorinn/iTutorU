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