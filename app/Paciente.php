<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Paciente extends Model {

    public static function boot(){
        parent::boot();
    }

    protected $fillable = ['nome', 'prontuario', 'data_nascimento', 'rg', 'orgao', 'estado_id'];

    protected $dates = ['data_nascimento'];

    public function estado()
    {
        return $this->hasOne('App\Estado', 'id', 'estado_id');
    }

}
