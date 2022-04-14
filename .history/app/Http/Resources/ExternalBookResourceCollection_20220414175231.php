<?php




namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExternalBookResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param $data
     * @return array
     */
    public function toArray($data)
    {
       
    }

    /**
     * @param $data
     * @return array
     */
    private function transformData($data)
    {
        return [
            'name' => $data['name'],
            'isbn' => $data['isbn'],
            'authors' => $data['authors'],
            'number_of_pages' => $data['numberOfPages'],
            'publisher' => $data['publisher'],
            'country' => $data['country'],
            'release_date' => self::formatStringToDate($data['released']),
        ];
    }

    public function formatStringToDate($date)
    {
        return date('Y-m-d', strtotime($date));

    }

}
