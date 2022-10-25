<?php

class FeedModel extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param string $name
	 * @return array|false
	 */
	public function getAuthorByName(string $name)
	{
		return $this->query->select('SELECT id FROM authors WHERE name = :name', [':name' => $name]);
	}

	/**
	 * @param string $name
	 * @return array|false
	 */
	public function getAuthorById(int $id)
	{
		return $this->query->select('SELECT id FROM authors WHERE id = :id', [':id' => $id]);
	}

	/**
	 * @param string $name
	 * @return false|string
	 */
	public function addBook(string $name)
	{
		return $this->query->insert('books', ['book_name' => $name]);
	}

	/**
	 * @param string $name
	 * @return false|string
	 */
	public function addAuthor(string $name)
	{
		return $this->query->insert('authors', ['book_name' => $name]);
	}

	/**
	 * @param int $authorId
	 * @param int $bookId
	 * @return false|string
	 */
	public function addAuthorsBooks(int $authorId, int $bookId)
	{
		return $this->query->insert('authors_books', ['author_id' => $authorId, 'book_id' => $bookId]);
	}
}