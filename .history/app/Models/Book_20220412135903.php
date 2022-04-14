<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'isbn', 'authors', 'number_of_pages', 'country', 'publisher', 'release_date'
    ];

    public static $searchable_fields = [
        'name', 'isbn', 'country', 'publisher', 'release_date'
    ];
}
