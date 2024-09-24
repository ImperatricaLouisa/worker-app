<?php

namespace App\Console\Commands;

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
        $worker = Worker::find(1);
        $worker->update([
            'age'=>'13.000'
        ]);
        return 0;
    }
}
