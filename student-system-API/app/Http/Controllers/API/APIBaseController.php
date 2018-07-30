<?php
/**
 * Created by PhpStorm.
 * User: MAXIMILIAN
 * Date: 7/27/2018
 * Time: 15:27
 */




namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class APIBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}