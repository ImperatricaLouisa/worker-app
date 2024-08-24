<?php

namespace App\Console\Commands;

use App\Models\Department;
use App\Models\Project;
use App\Models\Worker;
use App\Models\Position;

use Illuminate\Console\Command;

class DevCommand extends Command
{
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
    public function handle()
    {
//        $this->prepareData();
//        $this->prepareManyToMany();

//        $department = Department::find(1);

        $worker = Worker::find(1);
//        dd($worker->position->department->toArray());
        dd($worker->projects->toArray());

        return 0;
    }

    private function prepareData()
    {
        $department1 = Department::create([
            'title' => 'IT'
        ]);
        $department2 = Department::create([
            'title' => 'Analytics'
        ]);

        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id
        ]);
        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department1->id
        ]);

        $workerData1 = [
            'name' => 'Тюпка',
            'surname' => 'Выдровски',
            'email' => 'vydra@otter.com',
            'position_id' => $position1->id,
            'age' => 22,
            'description' => 'Люблю выдрушек',
            'is_married' => false,
        ];
        $workerData2 = [
            'name' => 'Боземоська',
            'surname' => 'Блинчишкинс',
            'email' => 'love@otter.com',
            'position_id' => $position1->id,
            'age' => 25,
            'description' => 'Люблю выдрушек',
            'is_married' => true,
        ];
        $workerData3 = [
            'name' => 'Цунами',
            'surname' => 'Оттергерл',
            'email' => 'Rybov@otter.com',
            'position_id' => $position2->id,
            'age' => 3,
            'description' => 'Люблю кушать рыбов',
            'is_married' => true,
        ];
        $workerData4 = [
            'name' => 'Франческа',
            'surname' => 'Пафосная',
            'email' => 'Pafos@otter.com',
            'position_id' => $position2->id,
            'age' => 19,
            'description' => 'Люблю говорить о Ницше',
            'is_married' => true,
        ];
        $workerData5 = [
            'name' => 'Камбала',
            'surname' => 'Фишер',
            'email' => 'Ryba@otter.com',
            'position_id' => $position1->id,
            'age' => 3,
            'description' => 'Люблю когда не кушают рыбов',
            'is_married' => true,
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);

        $profileData1 = [
            'city' => 'Луизасити',
            'skill' => 'Мастер по обнимашкам',
            'experience' => 13,
            'finished_study_at' => '2024-06-13',
        ];
        $profileData2 = [
            'city' => 'Сингапур',
            'skill' => 'Боссить',
            'experience' => 23,
            'finished_study_at' => '2024-06-13',
        ];
        $profileData3 = [
            'city' => 'Река',
            'skill' => 'Ворнякать',
            'experience' => 3,
            'finished_study_at' => '2024-06-13',
        ];
        $profileData4 = [
            'city' => 'Санкт-Петербург',
            'skill' => 'Философствовать',
            'experience' => 1,
            'finished_study_at' => '2024-06-13',
        ];
        $profileData5 = [
            'city' => 'Атлантический океан',
            'skill' => 'Буль буль',
            'experience' => 5,
            'finished_study_at' => '2024-06-13',
        ];

        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
    }

    private function prepareManyToMany()
    {
        $WorkerManager = Worker::find(3);
        $WorkerBack = Worker::find(1);
        $WorkerDesigner1 = Worker::find(2);
        $WorkerFront = Worker::find(5);
        $WorkerDesigner2 = Worker::find(4);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);
        $project2 = Project::create([
            'title' => 'Blog'
        ]);

        $project1->workers()->attach([
            $WorkerManager->id,
            $WorkerBack->id,
            $WorkerDesigner1->id,
            $WorkerFront->id,

        ]);
        $project2->workers()->attach([
            $WorkerManager->id,
            $WorkerBack->id,
            $WorkerFront->id,
            $WorkerDesigner2->id,
        ]);
    }
}
