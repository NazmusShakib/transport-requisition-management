<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Utilities\Utility;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilityController extends Controller
{
    /**
     * Utilities instance.
     *
     */
    protected $utility;

    public function __construct(Utility $utility)
    {
        $this->utility = $utility;
    }

    /**
     * return available pay modes
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function payModes()
    {
        $pay_modes = $this->utility->pay_modes();
        return response()->json($pay_modes, Response::HTTP_OK);
    }
}
