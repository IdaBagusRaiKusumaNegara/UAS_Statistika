<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMoment extends Model
{
    use HasFactory;
    protected $table = "produk_moments";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'x', 'y'
    ];
}