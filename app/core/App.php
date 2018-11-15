<?php

//Entry point to application
class App {

	protected $controller = 'UserController';
	protected $method = 'index';
	protected $params = [];
	protected $found;

	public function __construct() {
		$url = $this->parseUrl();

		if(file_exists('app/controllers/' . $url[0] . 'Controller.php')){
			$this->controller = $url[0] . 'Controller';
			unset($url[0]);
			//$found = true;
		}

		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller();


		if(isset($url[1])) {
			if(method_exists($this->controller, $url[1]) /*&& $this->found*/){
				$this->method = $url[1];				
			}
			unset($url[1]);
		}

		$this->params = $url ? array_values($url):[];
		call_user_func_array([$this->controller, $this->method], $this->params);
	//echo 'hello world';
	}


	public function parseUrl() {
		if(isset($_GET['url'])){ //isset verfifies whether or not smthg exists
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/')), FILTER_SANITIZE_URL);
			/* / is separator for url


			*/
		}
	}
}


?>