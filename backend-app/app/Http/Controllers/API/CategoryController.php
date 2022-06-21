<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\BlogCategories;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        return CategoryResource::collection(BlogCategories::all());
    }

}
