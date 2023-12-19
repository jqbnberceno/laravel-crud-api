<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;


class Main_Controller extends Controller
{
 
 //retrieves all data
    public function retrieve()
    {
        $data = Data::all();
        return response()->json($data, 200);
    }

    //insert a data

    public function insert(Request $request)
    {

        $request->validate ([
            'name' => 'required|string|max:30',
            'age' => 'required|int|min:0',
            'gender' => 'required|string|max:10'
        ]);

        $data = Data::create([
            'name' => $request->name,
            'age'  => $request->age,
            'gender' => $request->gender
        ]);

        return response()->json($data, 200);

    }

    //update a data

    public function update(Request $request, $id)
    {
        $data = Data::find($id);

        $request->validate ([
            'name' => 'required|string|max:30',
            'age' => 'required|int|min:0',
            'gender' => 'required|string|max:10'
        ]);

        $data->update($request->all());

        return response()->json($data, 200);

    }

    public function destroy(Request $request, $id)
    {
        $data = Data::find($id);

        $data->delete();
    }

}
