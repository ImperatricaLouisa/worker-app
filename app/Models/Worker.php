<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
    {
        use HasFactory;
        use SoftDeletes;

        protected $table = 'workers'; //Указывает, что данная модель связана с таблицей workers в базе данных.
        protected $guarded = false;

        protected static function booted()
        {

        }

        public function profile()
        {
            return $this->hasOne(Profile::class);
        }

        public function position()
        {
            return $this->belongsTo(Position::class);
        }


        public function projects()
        {
            return $this->belongsToMany(Project::class);
        }

        public function avatar()
        {
            return $this->morphOne(Avatar::class, 'avatarable');
        }

        public function reviews()
        {
            return $this->morphMany(Review::class, 'reviewable');
        }

        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggable');
        }
    }

