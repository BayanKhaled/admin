<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class movieCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    //public $collects = 'App\Http\Resources\Member';

    
    public function toArray($request)
    {
        // return parent::toArray($request);
        // return ['data' => $this->collection];
        return ['data' => $this->collection];
    }

/*
    return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];*/
}
