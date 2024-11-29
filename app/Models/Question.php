<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question',
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
