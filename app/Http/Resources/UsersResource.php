<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'birthdate' => $this->birthdate,
            'email' => $this->email,
            'phone' => $this->phone,
           'role' => $this->role->name,
            'orders' => $this->orders

        ];
    }
}
