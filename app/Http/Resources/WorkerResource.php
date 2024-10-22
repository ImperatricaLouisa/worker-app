<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, //$this обращение к объекту на основе класса WorkerResource который возьмется из ApiWorkerController
            //на основе объектов $workers создастся обертка класса WorkerResource и в обертку WorkerResource поместятся все атрибуты объекта $workers из ApiWorkerController
            'name' => $this->name,
            'surname' => $this->surname,
            'age' => $this->age,
            'created_at' => $this->created_at->format('Y-m-d')//format() - метод класса Carbon работающий с атрибутами формата дата
        ];
    }
}
