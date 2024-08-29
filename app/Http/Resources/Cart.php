<?php

namespace App\Http\Resources;

use App\Http\Resources\Food as ResourcesFood;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Cart extends JsonResource
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
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'food' => ResourcesFood::make($this->food),
            'resturent_id' => $this->resturent_id,
            

        ];
    }
}
