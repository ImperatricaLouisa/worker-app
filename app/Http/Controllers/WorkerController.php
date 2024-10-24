<?php

namespace App\Http\Controllers;

use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class WorkerController extends Controller
{
    use AuthorizesRequests;
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
//        $filter = app()-make(WorkerFilter::class,['params' => $data]);
        $filter = new WorkerFilter($data);
        $workerQuery = Worker::filter($filter);
        $workers = $workerQuery->paginate(2);

        return view('worker.index', compact('workers'));
        //Функция compact('workers') создаёт массив с ключом 'workers', который затем используется в шаблоне представления.
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {

        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Worker::class);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']) ? true : false;
        Worker::create($data);
        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        $this->authorize('update', $worker);
        return view('worker.edit', compact('worker'));
    }

    public function update(UpdateRequest $request, Worker $worker)
    {
        $this->authorize('update', $worker);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']) ? true : false;
        $worker->update($data);
        return redirect()->route('workers.show', $worker->id);
    }
    public function destroy(Worker $worker)
    {
        $this->authorize('delete', $worker);
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
