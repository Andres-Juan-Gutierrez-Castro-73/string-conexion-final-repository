<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Equipo extends Model
{
    
    static $rules = [
		'nombre_equipo' => 'required',
		'nombre_integrante1' => 'required',
		'nombre_integrante2' => 'required',
		'nombre_integrante3' => 'nullable',
		'servicios_ofrecidos' => 'required',
		'diponibilidad' => 'required',
		'correo_usuario_creador' => 'required',
    ];

    protected $perPage = 20;

    
    protected $fillable = ['nombre_equipo','nombre_integrante1','nombre_integrante2','nombre_integrante3','servicios_ofrecidos','diponibilidad','correo_usuario_creador'];


    
    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto', 'nombre_equipo_creador', 'id');
    }
    
    
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'correo_usuario_creador');
    }
    

}
