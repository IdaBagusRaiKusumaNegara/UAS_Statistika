<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjiT extends Model
{
    use HasFactory;
    protected $table = 'uji_t';
    protected $fillable = ['x1', 'x2'];
}