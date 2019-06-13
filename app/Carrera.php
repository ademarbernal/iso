<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public $table ="carreras";
      protected $fillable=['nombre','nivelacademico','duracion'];
      
    public function aula(){

        	return $this->hasOne('App\Aula','id','aula_id');
     }
    public function materia(){

        	return $this->hasOne('App\Materia','id','materia_id');
     }
     public function horario(){

        	return $this->hasOne('App\Horario','id','horario_id');
     }
}
