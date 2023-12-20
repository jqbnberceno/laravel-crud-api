<?php

namespace App\Services;

use App\Repositories\CRUD_Repository;
use Illuminate\Http\Request;


class CRUD_Service
{    
    protected $crudRepository;

    public function __construct(CRUD_Repository $crudRepository)
    {
        $this->crudRepository = $crudRepository;
    }

    public function retrieve(){

        return $this->crudRepository->retrieve();

    }

    public function insert(array $validatedData){

        return $this->crudRepository->insert($validatedData);

    }

    public function update(array $validatedData, $id){

        return $this->crudRepository->update($validatedData, $id);

    }
    public function destroy($id){

        return $this->crudRepository->destroy($id);

    }

}