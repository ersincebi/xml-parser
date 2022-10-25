<?php
class Bootstrap {
	private $url = NULL;

	private $controller = NULL;

	/**
	 * @return void
	 */
	public function init()
	{
		$this->getUrl();
		$this->loadExistingController();
		$this->callControllerMethod();

	}

	/**
	 * @return void
	 */
	private function getUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->url = explode('/', $url);
	}

	/**
	 * @return false|void
	 */
	private function loadExistingController()
	{
		if (!$this->url[0]) {
			$this->url[0] = 'index';
		}

		$file = 'controllers/' . $this->url[0] . '.php';
		if (file_exists($file)) {
			require $file;
			$this->controller = new $this->url[0];
			$this->controller->loadHelpers($this->url[0]);
		} else {
			return false;
		}
	}

	/**
	 * @return void
	 */
	private function callControllerMethod()
	{
		$requests = array();
		if (count($this->url) > 1) {
			$requests[] = array_slice($this->url, 2);
			call_user_func_array([$this->controller, $this->url[1]], $requests);
		} else {
			$this->controller->index($requests);
		}
	}
}