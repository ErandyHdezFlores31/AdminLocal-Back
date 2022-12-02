<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    public $table = "clientes";
    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'fechainiciorenta',
        'fechasalida',
        'diasrentados',
        'totalrenta',
        'locales_id',
    ];

    public function locales()
    {
        return $this->belongsTo(Locales::Class);
    }
}
