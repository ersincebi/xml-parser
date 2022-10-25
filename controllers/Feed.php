<?php

class Feed extends Controller
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

	/**
	 * @param array $request
	 * @return void
	 */
	public function feedData(array $request)
	{
		$xmlRequest = FeedMapper::map();
		FeedService::addOrUpdate($xmlRequest);

		$this->view->setRedirect('booklist');
	}
}