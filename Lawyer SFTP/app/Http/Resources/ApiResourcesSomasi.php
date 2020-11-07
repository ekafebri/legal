<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResourcesSomasi extends JsonResource
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
            'judul'     => $this->judul,
            'penjelasan'=> $this->penjelasan,
            'file'      => json_decode($this->file),
            'filename'  => json_decode($this->filename)??''
        ];
    }
}