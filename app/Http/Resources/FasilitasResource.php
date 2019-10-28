<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FasilitasResource extends JsonResource
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
            'tipe' => $this->tipe,
            'deskripsi' => $this->deskripsi
        ];
    }
}
