<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'price',
        'paid',
        'updated_at',
    ];
    protected $table = 'expenses';
}
