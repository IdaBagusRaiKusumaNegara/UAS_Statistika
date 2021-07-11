<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjiAnava extends Model
{
    use HasFactory;
    protected $table = 'uji_anava';
    protected $fillable = ['x1', 'x2', 'x3'];
}