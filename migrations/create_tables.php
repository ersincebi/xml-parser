<?php
$authors_table = "CREATE TABLE `authors` (
    `id` serial NOT NULL,
    `author_name` character varying(100) NOT NULL,
    PRIMARY KEY (`id`));";

$book_table = "CREATE TABLE `books` (
    `id` serial NOT NULL,
    `book_name` character varying(100) NOT NULL,
    PRIMARY KEY (`id`));";

$authors_books = "CREATE TABLE `authors_books`
	`author_id` integer NULL,
    `book_id` integer NULL,
	FOREIGN KEY (`author_id`) REFERENCES `authors`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`book_id`) REFERENCES `books`(`id`) ON DELETE SET NULL ON UPDATE CASCADE";

require __DIR__.'/../app/Database.php';
require __DIR__.'/../app/Model.php';

$database = new Model();

$create_authors_table = $database->query->prepare($authors_table);
$create_authors_table->execute();

$create_books_table = $database->query->prepare($book_table);
$create_books_table->execute();

$create_authors_books_table = $database->query->prepare($authors_books);
$create_authors_books_table->execute();