<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Token extends Model
{
    use HasFactory;
    protected $table = 'tokens';
    protected $fillable = [
        'user_id',
        'token',
        'expires_at',
    ];
    public  function user(){
        return $this->belongsTo(User::class);

    }
}
