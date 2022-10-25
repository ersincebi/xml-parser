<?php

class BookList extends Controller
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
		$this->view->list = (object) BooklistService::getAuthorsBooks();
		$this->view->renderPage('index');
	}
}