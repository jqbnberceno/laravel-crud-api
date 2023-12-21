<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CRUD_EloquentInterface
{
    /**
     * @return Collection
     */
    public function retrieve(): Collection;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param array $data
     * @param int $id
     * @return Model|null
     */
    public function update(array $data, int $id);

    /**
     * @param int $id
     * @return Model|null
     */
    public function destroy(int $id);
}
