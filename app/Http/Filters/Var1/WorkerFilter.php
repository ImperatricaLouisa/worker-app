<?php

namespace App\Http\Filters\Var1;
use Illuminate\Database\Eloquent\Builder;


class WorkerFilter {

    private array $params = [];

    //В константах определены ключи для параметров фильтрации
    const NAME = 'name';
    const SURNAME = 'surname';
    const EMAIL = 'email';
    const AGE_FROM = 'from';
    const AGE_TO = 'to';
    const DESCRIPTION = 'description';
    const IS_MARRIED = 'is_married';


    public function __construct(array $params) //параметры передаются в конструктор класса в виде массива, а затем сохраняются в приватное свойство $params
    {
        $this->params = $params;
    }

    public function getCallbacks(): array //метод возвращает массив, где каждому ключу (например, name, email, from) сопоставлена строка, которая соответствует названию метода в классе.
    {
        return [
            self::NAME => 'name', //'name' соответствует названию соответствующей функции ниже
            self::SURNAME => 'surname',
            self::EMAIL => 'email',
            self::AGE_FROM => 'ageFrom',
            self::AGE_TO => 'ageTo',
            self::DESCRIPTION => 'description',
            self::IS_MARRIED => 'isMarried',
            //self: используется для доступа к статическим методам и свойствам класса, а также для вызова методов и констант внутри того же класса. При этом не требуется создавать объект класса.
        ];
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
    public function name(Builder $builder, $value)
    {
        $builder->where('name','like',"%{$value}%");
    }

    public function surname(Builder $builder, $value)
    {
        $builder->where('surname','like',"%{$value}%");
    }
    public function email(Builder $builder, $value)
    {
        $builder->where('email','like',"%{$value}%");
    }
    public function ageFrom(Builder $builder, $value)
    {
        $builder->where('age','>',$value);
    }
    public function ageTo(Builder $builder, $value)
    {
        $builder->where('age','<',$value);
    }
    public function description(Builder $builder, $value)
    {
        $builder->where('description','like',"%{$value}%");
    }
    public function isMarried(Builder $builder, $value)
    {
        $builder->where('is_married',true);
    }
}
