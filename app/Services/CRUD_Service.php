<?php

namespace App\Services;

use App\Repositories\Interfaces\CRUD_Interface;

class CRUD_Service
{    
    protected $crudRepository;

    public function __construct(CRUD_Interface $crudRepository)
    {
        $this->crudRepository = $crudRepository;
    }

    public function retrieve(){

        return $this->crudRepository->retrieve();

    }

    public function insert(array $validatedData){

        return $this->crudRepository->create($validatedData);

    }

    public function update(array $validatedData, $id){

        return $this->crudRepository->update($validatedData, $id);

    }

    public function search($id){

        return $this->crudRepository->search($id);

    }
    public function destroy($id){

        return $this->crudRepository->destroy($id);

    }

}