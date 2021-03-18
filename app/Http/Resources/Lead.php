<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Lead extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'value' => $this->value,
            'name' => $this->name,
            'details' => $this->details,
            'segment' => $this->segment,
            'by' => $this->by,
            'for' => $this->for,
            'status' => $this->status,
            'updated_at' => $this->updated_at->format('Y-m-d, h:m')
        ];
    }
}
