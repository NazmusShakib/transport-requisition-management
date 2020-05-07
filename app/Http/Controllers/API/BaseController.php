<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * return error response.
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = Response::HTTP_NOT_FOUND)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['errors'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

}
