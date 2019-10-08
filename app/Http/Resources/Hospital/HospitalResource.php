<?php

namespace App\Http\Resources\Hospital;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalResource extends JsonResource
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
            'hospital_id'=> $this->id,
            'name'=> $this->name,
            'href'=>[
                'url'=> 'http://127.0.0.1:8000/api/hospitals/'.$this->id.'/patients'
                
                
            ]
        ];
    }
}
