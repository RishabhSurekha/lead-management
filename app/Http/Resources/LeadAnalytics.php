<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadAnalytics extends JsonResource
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
            'open' => $this['open'],
            'closed' => $this['closed'],
            'validated' => $this['validated'],
            'rejected' => $this['rejected']
        ];
    }
}
