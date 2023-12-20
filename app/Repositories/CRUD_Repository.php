<?php

namespace App\Repositories;

use App\Models\Data;
class CRUD_Repository
{

    public function retrieve()
    {
        $data = Data::all();
        return $data;
    }
    public function insert(array $data)
    {
        return Data::create($data);
    }

    public function update(array $data, $id)
    {
        return Data::where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return Data::where('id', $id)->delete();
    }



}