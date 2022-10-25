<?php
class Model
{
	public $query;

	/**
	 * @return void
	 */
	public function __construct(){
		$this->query = new Database(
			getenv('DB_TYPE'),
			getenv('DB_CHARSET'),
			getenv('DB_HOST'),
			getenv('DB_NAME'),
			getenv('DB_USER'),
			getenv('DB_PASS')
		);
	}
}