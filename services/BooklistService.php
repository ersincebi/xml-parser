<?php

require __DIR__.'/../models/BooklistModel.php';

abstract class BooklistService
{
	public static function getAuthorsBooks()
	{
		return (new BooklistModel())->getAuthorsBooks();
	}
}