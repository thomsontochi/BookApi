<?php

namespace App\Interfaces;

interface BooksRepositoryInterface 
{
    public function getAllBooks();
    public function getBooksById($BooksId);
    public function deleteBooks($BooksId);
    public function createBooks(array $BooksDetails);
    public function updateBooks($BooksId, array $newDetails);
    public function getFulfilledBooks();
}