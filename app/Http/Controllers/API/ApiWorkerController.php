<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class ApiWorkerController extends Controller
{
    public function index() {
        $workers = Worker::all();
	    return WorkerResource::collection($workers)->resolve();
    }

	public function show(Worker $worker) {
		return WorkerResource::make($worker)->resolve();
	}
}
