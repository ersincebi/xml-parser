<?php

require __DIR__.'/../models/FeedModel.php';
require __DIR__ . '/../requests/Feed/FeedAuthorsBooks.php';

abstract class FeedService
{
	/**
	 * @param array $request
	 * @return void
	 */
	public static function addOrUpdate(array $request)
	{
		$feedModel = new FeedModel();

		foreach ($request as $row)
		{
			if ((string)(int) $row->getAuthor() == $row->getAuthor()) {
				$authorId = (self::getAuthorById($row->getAuthor())) ?? NULL;
			} else {
				$authorId = (self::getAuthorByName($row->getAuthor())) ?? NULL;
			}

			if (!$authorId) {
				$authorId = $feedModel->addAuthor($row->getAuthor());
			}

			$bookId = $feedModel->addBook($row->getBook());
			$feedModel->addAuthorsBooks((int) $authorId, (int) $bookId);
		}
	}

	/**
	 * @param string $name
	 * @return int
	 */
	public static function getAuthorByName(string $name)
	{
		return (new FeedModel())->getAuthorByName($name);
	}

	/**
	 * @param int $id
	 * @return int
	 */
	public static function getAuthorById(int $id)
	{
		return (new FeedModel())->getAuthorById($id);
	}
}