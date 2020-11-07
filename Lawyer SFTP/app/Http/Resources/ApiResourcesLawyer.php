<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResourcesLawyer extends JsonResource
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
            'lawyer_id' => $this->lawyer_id,
            'nama_lengkap' => $this->nama_lengkap,
            'avatar' => $this->avatar,
            'status_online' => $this->status_online,
            'gelar' => $this->gelar,
            'deskripsi_layanan' => $this->deskripsi_layanan??'',
        ];
    }
}