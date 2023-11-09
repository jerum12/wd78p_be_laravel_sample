<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "product_name"=> $this->product_name,
            "product_description"=> $this->product_description,
            "amount"=> $this->amount,
            "currency"=> $this->currency,
        ];
    }
}
