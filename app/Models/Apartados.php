<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartados extends Model
{
    use HasFactory;

    public $table = "apartados";
    protected $fillable = [
        'id',
        'nombre',
        'fechapartado',
        'fechainicio',
        'fechasalida',
        'diasrentados',
        'totalrenta',
        'adelanto',
        'resto',
        'fechavencimiento',
        'locales_id',
    ];

    public function locales()
    {
        return $this->belongsTo(Locales::Class);
    }
}
