<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResourcesUsers extends JsonResource
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
            'nama_lengkap' => $this->nama_lengkap,
            'email' => $this->email,
            'telp' => $this->telp,
            'avatar' => $this->avatar,
            'role' => $this->role,
            'alamat' => $this->alamat,
            'token' => $this->token,
            'fcm_token' => $this->fcm_token,
            'status' => $this->status,
            'jenis_kelamin' => $this->jenis_kelamin,
            'password' => $this->password,
            'type' => $this->type,
            'no_ktp' => $this->no_ktp,
            'ktp' => $this->ktp,
            'selfie_ktp' => $this->selfie_ktp,
            'npwp' => $this->npwp,
            'nib' => $this->nib,
            'status_app' => $this->status_app,
            'versi_app' => $this->versi_app,
            'verified' => $this->verified,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}