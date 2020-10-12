<?php
namespace App\Http\Controllers\Api;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponseTrait {
      public function ApiResponse($data = null , $error = null , $code = Response::HTTP_OK)
      {
          $array = [
              'data' => $data,
              'status' => in_array($code , $this->successCode()) ? true : false ,
              'error' => $error

          ];
          return response()->json($array, $code);
      }


      public function successCode()
      {
          return [
            Response::HTTP_OK , Response::HTTP_CREATED , Response::HTTP_ACCEPTED
          ];
      }
}
