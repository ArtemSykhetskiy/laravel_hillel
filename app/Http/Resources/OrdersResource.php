<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
         'name' => $this->name,
         'surname' => $this->surname,
         'country' => $this->country,
         'city' => $this->city,
         'address' => $this->address,
         'total' => $this->total,
           'products' => $this->products
       ];
    }
}
