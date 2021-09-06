<?php

namespace App\Core\Traits;

trait ApiResponser {

    public function success($data, $code = 200){
        return response([
            'status' => $code,
            'data' => $data
        ], $code);
    }
    
    public function error($message, $code){
        return response([
            'error' => true,
            'status' => $code,
            'message' => $message
        ], $code);
    }
    
    public function responseMsg($message, $code = 200){
        return response($message, $code);
    }
}