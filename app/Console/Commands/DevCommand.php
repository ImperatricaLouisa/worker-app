<?php

namespace App\Console\Commands;

use App\Http\Filters\Var1\WorkerFilter;
use App\Jobs\SomeJob;
use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Worker;
use App\Models\Position;

use Illuminate\Console\Command;

class DevCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'worker-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание рабочего';

    /**
     * Execute the console command.
     */
    public function handle() {
        $workerQuery = Worker::query();
        $filter = new WorkerFilter(['from'=>10, 'to' => 100]);
        $filter->applyFilter($workerQuery);
        dd($workerQuery->get());
        return 0;
    }
}
