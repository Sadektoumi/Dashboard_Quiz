<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = [

        'Title',
        'category_id',

        'date',
        'time_limit',
        'attempts_allowed',
        'points',
        'instructions',




        ];

    public function  category()
    {
        return $this->belongsTo(Category::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

}
