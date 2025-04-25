<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->first_name.' '.$this->last_name,
            'email' => $this->email,
            'personal_phone' => $this->personal_phone,
            'nationality' => $this->nationality,
            'country_of_residence' => $this->country_of_residence,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
