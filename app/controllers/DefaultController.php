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

		public function login() {
			if(isset($_POST['username'])){
				echo "username is " . $_POST['username'];
			}


		}

		public function showClient($client_id) {
			//$client = $this->model('Client')->find($client_id); OR
			$client = $this->model('Client');
			$client = $client->find($client_id);
			echo $client->first_name;
			$contacts = $client->getContacts();

			//$this->view('Default/showClient', ['client'=>$client, 'contacts'=>$contacts]);
		}
	}

?>