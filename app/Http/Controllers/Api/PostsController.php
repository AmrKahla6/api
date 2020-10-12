<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Posts;
use App\Http\Resources\PostsResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        // first way to paginate page

        // $offset = request()->has('offset') ? request()->get('offset') : 0 ;

        // $posts = PostsResource::collection(Posts::limit(10)->offset($offset)->get());

        // secound way to paginate page

        $posts = PostsResource::collection(Posts::paginate($this->paginatePage()));

        return $this->ApiResponse($posts);

    }// end of get all posts

    public function show(Posts $post )
    {
        if($post)
        {

            return $this->ApiResponse(new PostsResource($post));
        }
        else {
            return notFoundResponse();
        }
    }// end of get 1 post

    public function store(PostRequest $request)
    {
        // if(!$request->has('title') && $request->get('title' == ''))
        // {
        //     return $this->ApiResponse(null , "Title is required" , Response::HTTP_NON_AUTHORITATIVE_INFORMATION);
        // }

        // $validate = Validator::make($request->all() , [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);


        $post =  Posts::create($request->all());

        if($post)
        {
            return $this->createResponse($post);
        } else {
            return $this->notFoundResponse();
        }

    }// end of store function

    public function update(PostRequest $request , Posts $posts)
    {

        // if($validate->fails())
        // {
        //     return $this->ApiResponse(null , $validate->errors() , Response::HTTP_UNPROCESSABLE_ENTITY);
        // }

        $posts->update($request->all());

        if($posts)
        {
            return $this->ApiResponse(new PostsResource($posts) , Response::HTTP_RESET_CONTENT);
        } else {
            return $this->notFoundResponse();
        }

    }// end of update function


    public function destroy($id)
    {
       $post = Posts::find($id);

       if($post)
       {
           $post->delete();

           return $this->deletedResponse();
       }

    }// end of delete function

}// end of controller
