<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PinRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Super;

class ArticleController extends Controller
{
    public function index($cat_id)
    {
        return Super::sendResponse(CategoryResource::collection(Article::whereCategoryId($cat_id)->paginate(5)));
    }
    
}