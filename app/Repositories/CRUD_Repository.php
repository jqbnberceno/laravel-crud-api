<?php

namespace App\Repositories;

use App\Models\Data;
use App\Repositories\Interfaces\CRUD_EloquentInterface;
use App\Repositories\Interfaces\CRUD_Interface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
class CRUD_Repository implements CRUD_EloquentInterface, CRUD_Interface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Data $model)
    {
        $this->model = $model;
    }

     /**
     * @param array $attributes
     *
     * @return Model
     */

     public function retrieve(): Collection
     {
        return $this->model->all();
     }

     public function create(array $data): Model{
        return $this->model->create($data);
     }

     public function update(array $data, $id)
     {
        $model = $this->model->find($id);

        $model->update($data);
     }

     public function destroy(int $id)
     {
        return $this->model->find($id)->delete();
     }

     



}