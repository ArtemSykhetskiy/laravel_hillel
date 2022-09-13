<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return response()->json(['data' => CategoryResource::collection(Category::all())]);
    }

    public function show(Category $category, User $user)
    {
        return response()->json(['data' => new CategoryResource($category)]);
    }
}
