<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
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
            'description' => $this->description,
            'address' => $this->address,
            'business_phone' => $this->business_phone,
            'home_phone' => $this->home_phone,
            'gender' => $this->gender,
            'dob' => $this->dob ? date('d/m/Y',strtotime($this->dob)) : null,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
