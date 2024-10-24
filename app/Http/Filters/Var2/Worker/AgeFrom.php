<?php

namespace App\Http\Filters\Var2\Worker;

use Illuminate\Database\Eloquent\Builder;

class AgeTo
{
    public function handle(Builder $builder, \Closure $next)
    {
        if (request('age')){
            $builder->where('age', request('age'));
        }
        return $next($builder);
    }

}
