<?php

// Response API JSON

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'price' => (float) $this->price, // price di-cast ke float
            'stock' => $this->stock,
            'sku' => $this->sku,
            // 'is_active' => $this->is_active,
            'is_active' => (bool) ($this->is_active ?? true), //jika tidak diisi otomatis jadi true
            // created_at sebagai Carbon object, Resource convert ke ISO string.
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
        ];
    }
}
