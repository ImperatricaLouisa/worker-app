<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;

class ApiWorkerController extends Controller
{
    public function index() {
        $workers = Worker::all();
        return response()->json([
            'data' => $workers
        ]);
    }
}
