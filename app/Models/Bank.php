<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'money',
        'payment',
        'note',
        'goal',
        'updated_at',
    ];
    protected $table = 'bank';
}
