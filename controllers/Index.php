<?php

class Index extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param array $requests
	 * @return void
	 */
	public function index(array $requests)
	{
		$this->view->renderPage('index');
	}
}