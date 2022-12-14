<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locales extends Model
{
    use HasFactory;

    public $table = "locales";
    protected $fillable = [
        'id',
        'nombrelocal',
        'descripcion',
        'preciodia'
    ];
}
