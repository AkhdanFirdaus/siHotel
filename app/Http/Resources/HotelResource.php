<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'id' => $this->id,
            'nama' => $this->nama,
            'slug' => $this->slug,
            'lokasi' => $this->lokasi,
            'hotel_image' => $this->hotel_image,
            'alamat' => $this->alamat,
            'email' => $this->email,
            'rekening' => $this->rekening,
            'no_rekening' => $this->no_rekening,
            'moto' => $this->moto,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'user' => $this->user,
            'kamar' => $this->kamars,
        ];
    }
}
