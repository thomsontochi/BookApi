<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => $message
        ]);

    }
}