<?php

namespace App\Http\Filters\Var1;

abstract class AbstractFilter implements FilterInterface {

    private array $params = [];
    public function __construct(array $params) //параметры передаются в конструктор класса в виде массива, а затем сохраняются в приватное свойство $params
    {
        $this->params = $params;
    }

    public function applyFilter($builder) //задача этого метода — пройтись по массиву $params по его ключам и в случае существования ключа применить нужный фильтр к запросу
    {
        foreach($this->getCallbacks() as $key => $callback){
            if (isset($this->params[$key])){ //проверяется, существует ли ключ в массиве параметров
                $this->$callback($builder, $this->params[$key]);
                //Если параметр передан, вызывается соответствующий метод (например, name(), ageFrom(), email() и т.д.), передавая в него объект $builder (запрос на выборку данных) и значение для фильтрации
            }
        }
    }

    abstract public function getCallbacks(): array;

}
