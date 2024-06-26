<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Here you return an array of the properties you want to expose
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'duration' => $this->duration,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // Ensure that the 'bookings' relationship is loaded to avoid unnecessary queries
            // If it's loaded, it will present the bookings as a collection of BookingResource
            // Otherwise, it will be null
            'bookings' => $this->whenLoaded('bookings', function () {
                return BookingResource::collection($this->bookings);
            }),
        ];
    }
}
