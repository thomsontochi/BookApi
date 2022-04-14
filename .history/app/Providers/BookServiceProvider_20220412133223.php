<?php

namespace App\Providers;

use App\Repositories\BookRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BookRepositoryInterface;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
