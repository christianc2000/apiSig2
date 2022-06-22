<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransporteResource extends JsonResource
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
            'id' => $this->id,
            'placa' => $this->placa,
            'modelo' => $this->modelo,
            'linea' => $this->linea,
            'cantidad_asiento' => $this->cantidad_asiento,
            'numero_interno' => $this->numero_interno,
            'fecha_asignacion' => $this->fecha_asignacion,
            'fecha_baja' => $this->fecha_baja,
            'conductor_id' => $this->conductor_id
        ];
    }
}
