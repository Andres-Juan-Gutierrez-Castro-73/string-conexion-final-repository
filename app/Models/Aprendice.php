<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Aprendice extends Model
{
    
    static $rules = [
		'foto_perfil' => 'required',
		'habilidades' => 'required',
		'numero_documento' => 'required',
		'numero_telefono' => 'required',
		'cadena_id' => 'required',
		'programa_id' => 'required',
		'usuario_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array   
     */
    protected $fillable = ['foto_perfil','habilidades','numero_documento','numero_telefono','cadena_id','programa_id','usuario_id'];


    
    public function cadena()
    {
        return $this->hasOne('App\Models\Cadena', 'id', 'cadena_id');
    }
    
    
    public function programa()
    {
        return $this->hasOne('App\Models\Programa', 'id', 'programa_id');
    }
    
    
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }
    

}
