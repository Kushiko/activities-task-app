<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'name' => $this->name,
            'shortDescription' => $this->short_description,
            'description' => $this->description,
            'mediaFiles' => $this->media_files,
            'registrationUrl' => $this->registration_url,
            'location' => $this->location,
            'schedule' => $this->schedule,
            'likesCount' => $this->whenCounted('likedByUsers'),
            'activityType' => [
                'name' => $this->activityType->name,
                'iconPath' => $this->activityType->icon_path,
            ],
            'participant' => [
                'name' => $this->participant->name,
                'logoPath' => $this->participant->logo_path,
            ],
        ];
    }
}