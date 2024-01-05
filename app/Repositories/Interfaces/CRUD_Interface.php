<?php

namespace App\Repositories\Interfaces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CRUD_Interface extends CRUD_EloquentInterface
{

    public function retrieve(): Collection;

    public function create(array $data): Model;

    public function update(array $data, $id);
    
    public function search(int $id);

    public function destroy(int $id);


}
