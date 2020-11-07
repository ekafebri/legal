<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResourcesHelp extends JsonResource
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
            'name_contact' => $this->name_contact,
            'contact'  => $this->contact,
            'link' => ($this->id == 4)?$this->link(json_decode($this->contact, true)):[],
        ];
    }

    public function link($data)
    {
        foreach ($data as $v => $k) {
            $data1[] = [
                'judul' => $v,
                'link' => $k,
            ];
        }
        return $data1;
    }
}