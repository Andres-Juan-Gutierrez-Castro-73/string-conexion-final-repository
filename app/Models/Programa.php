<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Programa extends Model
{
    
    static $rules = [
		'nombre_programa' => 'required',
		'ficha_programa' => 'required',
		'cadena_id' => 'required',
    ];

    protected $perPage = 20;

    
    protected $fillable = ['nombre_programa','ficha_programa','cadena_id'];



    public function aprendices()
    {
        return $this->hasMany('App\Models\Aprendice', 'programa_id', 'id');
    }
    
    
    public function cadena()
    {
        return $this->hasOne('App\Models\Cadena', 'id', 'cadena_id');
    }
    

}
