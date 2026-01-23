<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Especificar el nombre de la tabla, si no sigue las convenciones de Laravel
    protected $table = 'producto';
    // Definir los campos que son asignables en masa
    protected $fillable = [
        'cod',
        'nombre',
        'nombre_corto',
        'descripcion',
        'pvp',
        'familia',
    ];
    // Especificar la relación con 'familia'
    public function familia()
    {

        return $this->belongsTo(Familia::class, 'familia', 'cod'); //Se van relacionando, la familia esta relacionado con el campo familia y el cod
    }
    // Definir la relación con 'stocks' mediante una relación de uno a muchos
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'producto', 'cod');
    }
}
