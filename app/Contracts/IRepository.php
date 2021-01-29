<?php


namespace App\Contracts;


interface IRepository
{
    public function getAll();


    public function find(int $id);

    public function create(array $data);

    public function update(array $data);

    public function delete(int $id);
}
