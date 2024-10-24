<?php

namespace App\Http\Filters\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class Age
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request()->has('age')){
            $builder->where('age', request('age'));
        }
        return $next($builder);
    }

}
