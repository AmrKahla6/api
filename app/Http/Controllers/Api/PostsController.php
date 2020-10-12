<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PostsController extends Controller
{
    public function index()
    {

        $posts = [
            [
                'title' => 'Here',
                'Body' => 'All Body',
            ],
            [
                'title' => 'Here',
                'Body' => 'All Body',
            ],
            [
                'title' => 'Here',
                'Body' => 'All Body',
            ],
            [
                'title' => 'Here',
                'Body' => 'All Body',
            ],
        ];

        return response()->json($posts, Response::HTTP_OK);

    }// end of get all posts
}
