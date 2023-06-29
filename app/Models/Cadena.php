<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cadena extends Model
{
    
    static $rules = [
		'nombre_cadena' => 'required',
    ];

    protected $perPage = 20;

    
    protected $fillable = ['nombre_cadena'];


    
    public function aprendices()
    {
        return $this->hasMany('App\Models\Aprendice', 'cadena_id', 'id');
    }
    
    
    public function programas()
    {
        return $this->hasMany('App\Models\Programa', 'cadena_id', 'id');
    }
    

}
