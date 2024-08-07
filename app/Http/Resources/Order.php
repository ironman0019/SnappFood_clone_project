<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'resturent_id' => $this->resturent_id,
            'address' => $this->address,
            'delivary_fee' => $this->delivary_fee,
            'total_amount' => $this->total_amount,
            'order_status' => $this->order_status,
            // 'comments' => Comment::collection($this->comments),
            'comments' => $this->when($request->get('include') == 'comments', Comment::collection($this->comments)),
        ];
    }
}
