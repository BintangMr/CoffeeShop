<?php

if(!function_exists('respSuccess')){
    function respSuccess($data, $meta = null){
        return response()->json([
            'message' => 'success',
            'description' => '',
            'meta'  => $meta,
            'data'  => $data
        ],200);
    }
}

if(!function_exists('respError')){
    function respError($description, $data = null, $meta = null){
        return response()->json([
            'exception' => 'Error',
            'message' => $description,
            'meta'  => $meta,
            'data'  => $data
        ],500);
    }
}

if(!function_exists('respNotFound')){
    function respNotFound($description, $title = null ,$data = null, $meta = null){
        return response()->json([
            'message' => $title ? $title : 'Not Found',
            'description' => $description,
            'meta'  => $meta,
            'data'  => $data
        ],404);
    }
}
