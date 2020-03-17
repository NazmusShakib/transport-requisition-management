<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nature;
use Illuminate\Http\Request;

class NatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $partyTypes = Nature::with('createdBy')
            ->orderBy('created_at', 'DESC')->paginate(15);

        return response()->json($partyTypes, 200);
    }
}
