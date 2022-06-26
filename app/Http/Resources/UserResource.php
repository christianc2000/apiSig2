<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray([
            'ci'=>$this->ci,
            'name'=>$this->name,
            'lastname'=>$this->lastname,
            'fecha_nac'=>$this->fecha_nac,
            'sex'=>$this->sex,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'password'=>$this->password,
            'category_licencia_id'=>$this->category_licencia_id,
        ]);
    }
}
