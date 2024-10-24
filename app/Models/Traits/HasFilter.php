<?php

namespace App\Models\Traits;
use App\Http\Filters\Var1\AbstractFilter;
use App\Http\Filters\Var1\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter {
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->applyFilter($builder);
        //applyFilter($builder) применяет фильтры к запросу. Он проходит по всем переданным данным и вызывает соответствующие методы фильтрации, добавляя условия к запросу.
        return $builder;
    }
}
