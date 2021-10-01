<?php

namespace App\Modules\Computers\Resources;

//use App\Modules\ComputerForProgram\Resources\ComputerForProgramResource;
//use App\Http\Resources\ComputerProgramResource;
use App\Modules\ComputerForProgram\Resources\ComputerProgramResource;
use App\Modules\ComputerForSale\Resources\ComputerForSale;
use App\Modules\ComputerMonofaktura\Resources\ComputerMonofakturaResource;
use App\Modules\OlchaProducts\Resources\ProductResource;
use App\Modules\ProductForComputer\Resources\ProductForComputer;
use Illuminate\Http\Resources\Json\JsonResource;

class ComputerResourceAll extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'image' => $this->image,
            'monofacture_id' => new ComputerMonofakturaResource($this->whenLoaded('manufactory')),
            'products' => ComputerForSale::collection($this->whenLoaded('product')),
            'program' => ComputerProgramResource::collection($this->whenLoaded('program')),
            'monofacture_id' => new ComputerMonofakturaResource($this->whenLoaded('manufactory'))

        ];
    }

}