<?php

namespace App\Modules\Computers\Repository;

use App\Modules\Computers\Models\Computer;
use http\Env\Request;

class ComputerReedRepository implements ComputerReedRepositoryInterface
{
    protected $model;

    public function __construct(Computer $model)
    {
        $this->model = $model;
    }

    public function getComputers()
    {
      return  $this->model::with(['product.product.product.category', 'program.program', 'manufactory'])->get();
    }

    public function getComputersById($id)
    {
        return $this->model::with(['product.product.product.category', 'program.program', 'manufactory'])->find($id);
    }
}