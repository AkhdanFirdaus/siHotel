<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KamarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'kode_kamar' => $this->kode_kamar,
            'fasilitas' => $this->fasilitas,
            'hotel_id' => $this->hotel_id,
            'harga' => $this->harga,
            'status' => $this->status,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'hotel' => $this->hotel
        ];
    }
}
