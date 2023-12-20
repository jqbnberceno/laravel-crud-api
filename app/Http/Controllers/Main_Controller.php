<?php

namespace App\Http\Controllers;

use App\Services\CRUD_Service;
use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Validation\ValidationException;


class Main_Controller extends Controller
{
    private $crudService;
 
    public function __construct(CRUD_Service $crudService)
    {
        $this->crudService = $crudService;
    }
 //retrieves all data
    public function retrieve()
    {
        $data = $this->crudService->retrieve();
        
        return response()->json($data, 200);
    }

    //insert a data

    public function insert(Request $request)
    {
        try{
        $validatedData = $request->validate ([
            'name' => 'required|string|max:30|min:3',
            'age' => 'required|int|min:1',
            'gender' => 'required|string|max:10|min:4'
        ]);
        } catch (ValidationException $e){
            return response()->json([
                'message' =>$e->errors(),
                'status' => 422,
            ],422);
        }
        
        $this->crudService->insert($validatedData);
        
        return response()->json(['message' => 'Successfully Inserted'], 200);
        
    }

    //update a data

    public function update(Request $request, $id)
    {
        try{
            $validatedData = $request->validate ([
                'name' => 'required|string|max:30|min:3',
                'age' => 'required|int|min:1',
                'gender' => 'required|string|max:10|min:4'
            ]);
            } catch (ValidationException $e){
                return response()->json([
                    'message' =>$e->errors(),
                    'status' => 422,
                ],422);
            }
            
            $this->crudService->update($validatedData, $id);

            return response()->json(['message' => 'Successfully Updated'], 200);

    }

    public function destroy(Request $request, $id)
    {

        $this->crudService->destroy($id);

        return response()->json(['message' => 'Successfully Deleted'], 200);

    }

}
