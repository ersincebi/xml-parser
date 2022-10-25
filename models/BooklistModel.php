<?php

class BooklistModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAuthorsBooks()
	{
		return $this->query->select('SELECT authors.author_name, books.book_name
									FROM authors_books
									INNER JOIN authors ON (authors.id = authors_books.authors_id)
									LEFT OUTER JOIN books ON (books.id = authors_books.book_id)');
	}
}