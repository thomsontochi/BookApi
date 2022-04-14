<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'type' => 'books',
            'book' => [
                'name' => $this->name,
                'isbn' => $this->isbn,
                'authors' => is_array($this->authors) ? $this->authors : self::formatToArray($this->authors),
                'number_of_pages' => $this->number_of_pages,
                'publisher' => $this->publisher,
                'country' => $this->country,
                'release_date' => $this->release_date,
                
            ]
            
        ];


    }
}
