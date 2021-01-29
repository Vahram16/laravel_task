<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;


abstract class EloquentRepository implements IRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;

    }


    public function getWithRelation(array $relation)
    {
        $this->model->with($relation)->get();

    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);

    }


    public function getAllWithRelation(array $relation)
    {

        return $this->make($relation)->get();
    }


    public function getFirstBy($key, $value, array $with = [])
    {

        return $this->make($with)->where($key, '=', $value)->first();

    }

    public function getManyBy($key, $value, array $with = [])
    {
        return $this->make($with)->where($key, '=', $value)->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }


    public function update(array $data)
    {
        $this->model->update($data);

    }

    public function delete(int $id)
    {
        $this->model->find($id)->delete();

    }

    public function make(array $with = [])
    {
        return $this->model->with($with);
    }


}
