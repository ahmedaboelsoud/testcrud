<?php
 
namespace App\Traits;

use Illuminate\Http\Request;


trait BaseResponse {

    public static function sendResponse($result){
        $response = [
            'success' => true ,
            'data' => $result,
        ];
        return response()->json($response , 200);
    }
    public static  function sendError($error , $errorMessages = [] , $code = 200){
        $response = [
            'success' => false ,
            'message' => $error
        ];
        if (!empty($errorMessages)) {
            # code...
            $response['error'] = $errorMessages;
        }
        return response()->json($response , $code);
        
    }


    public static  function sendError2($error , $errorMessages=[] , $code=200){
        $response = [
            'success' => false ,
            'message' => $error
        ];
        if (!empty($errorMessages)) {
            # code...
            $response['error'] = $errorMessages;
        }
        return response()->json($response , $code);
        
    }
  
}