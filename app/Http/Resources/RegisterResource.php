<?php

namespace App\Http\Resources;

use App\Models\Category_licencia;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
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
            'id'=>$this->id,
            'ci' => $this->ci,
            'names' => $this->names,
            'lastname' => $this->lastname,
            'date' => $this->date, 
            'sex' => $this->sex,
            'phone' => $this->phone,
            'mail' => $this->mail,
            'transporte' => TransporteResource::make($this->whenLoaded('transportes')),
            'category_id'=>$this->category_licencia_id,
            'user_id'=>$this->user_id
        ];
    }
}
