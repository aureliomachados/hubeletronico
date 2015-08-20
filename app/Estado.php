<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {

	protected $fillable = ['sigla', 'nome'];


    public function tcle(){
        return $this->belongsTo('App\TCLE');
    }
}
