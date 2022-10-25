<?php

require __DIR__ . '/../requests/Feed/FeedAuthorsBooks.php';

abstract class FeedMapper
{
	/**
	 * @return array|void
	 */
	public static function map()
	{
		$xmlData = simplexml_load_string(file_get_contents($_FILES['fileToUpload']['tmp_name'])) or die("Failed to load");

		$request = array();
		foreach ($xmlData as $row) {
			$request[] = new FeedAuthorsBooks($row->author, $row->name);
		}

		return $request;
	}
}