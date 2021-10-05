<?php

namespace App\Modules\OlchaProducts\Resources;

use App\Modules\OlchaCategories\Resource\OlchaCategoriesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_uz' => $this->name_uz,
            'name_oz' => $this->name_oz,
            'name_ru' => $this->name_ru,
            'alias' => $this->alias,
            'images' => $this->images,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'category name' => (new OlchaCategoriesResource($this->whenLoaded('category'))),
        ];
    }

}