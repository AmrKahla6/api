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
        // first way to paginate page

        // $offset = request()->has('offset') ? request()->get('offset') : 0 ;

        // $posts = PostsResource::collection(Posts::limit(10)->offset($offset)->get());

        // secound way to paginate page

        $posts = PostsResource::collection(Posts::paginate(10));

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

    public function store(Request $request)
    {
        $post =  Posts::create($request->all());

        if($post)
        {
            return $this->ApiResponse(new PostsResource($post) , Response::HTTP_CREATED);
        } else {
            return ApiResponse(null ,'Not Found', Response::HTTP_NOT_FOUND);
        }

    }
}
