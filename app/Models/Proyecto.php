<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Proyecto extends Model
{
    
    static $rules = [
		'nombre_proyecto' => 'required',
		'descripcion' => 'required',
		'imagen_proyecto' => 'required',
		'nombre_equipo1' => 'required',
		'nombre_equipo_creador' => 'required',
    ];

    protected $perPage = 20;

    
    protected $fillable = ['nombre_proyecto','descripcion','imagen_proyecto','nombre_equipo1','nombre_equipo_creador'];


    
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'nombre_equipo_creador');
    }
    

}
