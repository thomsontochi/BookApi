<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    public function getAllBooks();
    public function getBookById($BookId);
    public function deleteBook($BookId);
    public function createBook(array $BookDetails);
    public function updateBook($BookId, array $newDetails);
    public function getFulfilledBooks();

    
}