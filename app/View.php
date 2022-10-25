<?php
class View
{
	private $method = NULL;

	/**
	 * @param string $method
	 * @return void
	 */
	public function renderPage(string $method){
		$this->method = $method;
		foreach (['header', 'body', 'footer'] as $file) {
			require 'views/layouts/' . $file . '.php';
		}
	}

	/**
	 * @param string $path
	 * @return void
	 */
	public function setRedirect(string $path)
	{
		header('location:' . getenv('URL') . '/' . $path);
	}
}