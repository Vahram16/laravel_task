<?php


namespace App\Repositories\Option;


use App\Contracts\EloquentRepository;


class OptionRepository extends EloquentRepository implements IOptionRepository
{
    public function getFillable()
    {
        return $this->model->getFillable();
    }

}
