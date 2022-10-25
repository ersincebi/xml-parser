<?php

class FeedAuthorsBooks
{
	/**
	 * @var string|null
	 */
	private string $author;

	/**
	 * @var string|null
	 */
	private string $book;

	public function __construct($author, $book)
	{
		$this->author = $author;
		$this->book = $book;
	}

	public function getAuthor(): string
	{
		return $this->author;
	}

	public function getBook(): string
	{
		return $this->book;
	}
}