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

      public function paginatePage()
      {
          return 10;
      }

      public function createResponse($data)
      {
          return $this->ApiResponse($data  , null , Response::HTTP_CREATED );
      }

      public function deletedResponse()
      {
          return $this->ApiResponse(true  , null , Response::HTTP_OK );
      }

      public function notFoundResponse()
      {
          return $this->ApiResponse(null  , 'Not Found' , Response::HTTP_NOT_FOUND );
      }

      public function unKnownError()
      {
          return $this->ApiResponse(null  , 'Un know error' , 520 );
      }



}
