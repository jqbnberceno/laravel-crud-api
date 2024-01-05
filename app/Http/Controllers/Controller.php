<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="CRUD-API OpenApi",
 *      description="CRUD-API Project OpenApi description",   
 * 
 * )

 
 * @OA\Tag(
 *  name="CRUD API",
 *  description="Rest API documentation"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
