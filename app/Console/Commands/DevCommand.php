<?php

namespace App\Console\Commands;

use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Filters\Var2\Worker\AgeFrom;
use App\Http\Filters\Var2\Worker\AgeTo;
use App\Http\Filters\Var2\Worker\Name;
use App\Jobs\SomeJob;
use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Worker;
use App\Models\Position;

use Illuminate\Pipeline\Pipeline;
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
        request()->merge([
            'age_from' => 32,
            'age_to' => 100,
        ]);

        return 0;
    }
}
