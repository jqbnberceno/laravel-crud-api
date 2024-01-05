<?php

namespace App\Http\Controllers;

use App\Services\CRUD_Service;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Main_Controller extends Controller
{
    private $crudService;

    public function __construct(CRUD_Service $crudService)
    {
        $this->crudService = $crudService;
    }

 /**
 * @OA\Get(
 *     path="/retrieve-data",
 *     summary="Retrieve All User Data",
 *     description="Retrieve all the data from the system",
 *     tags={"CRUD Operations"},
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent(
 *         )
 * ),
 *          @OA\Response(
 *              response=422,
 *              description="Error",
 *              @OA\JsonContent(
 *                  @OA\Property(property="message", type="string")
 *                  )
 *              )
 *         )
 *     ),
 * )
 */

    public function retrieve()
    {
        $data = $this->crudService->retrieve();
        
        return response()->json($data, 200);
    }

/**
 * @OA\Post(
 *     path="/insert-data",
 *     summary="Insert new data",
 *     description="Inserts new data into the system",
 *     tags={"CRUD Operations"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Pass required parameters",
 *         @OA\JsonContent(
 *             @OA\Property(property="tenant_id", type="integer", description="ID of the tenant",example=1),
 *             @OA\Property(property="name",type="string", maxLength=30, minLength=3, example="Juaquin"),
 *             @OA\Property(property="age", type="integer", minimum=1, example=21),
 *             @OA\Property(property="gender", type="string", maxLength=10, minLength=4, example="Male")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string")
 *         )
 *     )
 * )
 */
    public function insert(Request $request)
    {
        try{
        $validatedData = $request->validate ([
            'tenant_id' => 'required',
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

 /**
 * @OA\Put(
 *     path="/update-data/{id}",
 *     summary="Update data",
 *     description="Update data in the system by ID",
 *     tags={"CRUD Operations"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the data to update",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Pass required parameters",
 *         @OA\JsonContent(
 *             @OA\Property(property="tenant_id", type="integer", description="ID of the tenant", example=1),
 *             @OA\Property(property="name", type="string", maxLength=30, minLength=3, example="Juaquin"),
 *             @OA\Property(property="age", type="integer", minimum=1, example=21),
 *             @OA\Property(property="gender", type="string", maxLength=10, minLength=4, example="Male")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Validation errors"
 *             )
 *         )
 *     )
 * )
 */

    public function update(Request $request, $id)
    {
        try{
            $validatedData = $request->validate ([
                'tenant_id' => 'required',
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

    /**
 * @OA\Get(
 *     path="/search-data/{id}",
 *     summary="Search data by ID",
 *     description="Search for specific data in the system by ID",
 *     tags={"CRUD Operations"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the data to search",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Data not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Data not found"
 *             )
 *         )
 *     )
 * )
 */

    public function search(Request $request, $id)
    {
        $result = $this->crudService->search($id);

        if (!$result) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        return response()->json($result, 200);
    }

     /**
 * @OA\Delete(
 *     path="/delete-data/{id}",
 *     summary="Delete data by ID",
 *     description="Delete for the specific data in the system by ID",
 *     tags={"CRUD Operations"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the data to delete",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Success",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Data not found",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Data not found"
 *             )
 *         )
 *     )
 * )
 */
    public function destroy(Request $request, $id)
    {

        $result = $this->crudService->destroy($id);

        if (!$result) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        return response()->json(['message' => 'Successfully Deleted'], 200);

    }

}
