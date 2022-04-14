<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Book;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface 
{
    public function getAllBooks() 
    {
        return Book::all();
    }

    public function searchBookTable($query)
    {
        if (self::isSearch($query)) {

            $key = array_key_first($query);

            if ($key == 'release_date') return self::searchTableByDate($key, $query[$key]);

            return self::searchTableByColumn($key, $query[$key]);
        }

        return 'invalid search key supplied';
    }

    public function isSearchfieild($data)
    {
        return count(array_intersect(array_keys($data), Book::$book_searchable_fields));
    }

    // public function getOrderById($orderId) 
    // {
    //     return Order::findOrFail($orderId);
    // }

    // public function deleteOrder($orderId) 
    // {
    //     Order::destroy($orderId);
    // }

    // public function createOrder(array $orderDetails) 
    // {
    //     return Order::create($orderDetails);
    // }

    // public function updateOrder($orderId, array $newDetails) 
    // {
    //     return Order::whereId($orderId)->update($newDetails);
    // }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}