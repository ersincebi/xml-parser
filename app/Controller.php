<?php
class Controller
{
	/**
	 * @return void
	 */
	public function __construct()
	{
		$this->view = new View();
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function loadHelpers(string $name)
	{
		foreach (['Service', 'Mapper'] as $require) {
			$file = ucfirst(strtolower($name)) . $require;
			if (file_exists(strtolower($require) . 's/' . $file . '.php')) {
				require strtolower($require) . 's/' . $file . '.php';
			}
		}
		$this->view->controller = $name;
	}
}