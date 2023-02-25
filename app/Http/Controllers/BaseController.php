<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function sendSuccess($data, $message = '', $code = 200){
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $code);
    }

    public function sendError($message, $code = 401){
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}
