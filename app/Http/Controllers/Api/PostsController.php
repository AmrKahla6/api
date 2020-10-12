<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Posts;
use App\Http\Resources\PostsResource;

class PostsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {

        $posts = PostsResource::collection(Posts::latest()->get());

        return $this->ApiResponse($posts);

    }// end of get all posts

    public function show(Posts $post )
    {
        if($post)
        {

            return $this->ApiResponse(new PostsResource($post));
        }
        else {
            return ApiResponse(null ,'Not Found', Response::HTTP_NOT_FOUND);
        }
    }// end of get 1 post
}
