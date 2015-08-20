<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TCLE extends Model {

	protected $table = 'tcles';

    protected $dates = ['data_nascimento'];

    protected $fillable = ['paciente', 'prontuario', 'data_nascimento',
        'rg', 'orgao', 'uf', 'diagnostico', 'procedimento', 'anestesia',
    'responsavel', 'parentesco_responsavel', 'rg_responsavel', 'cpf_responsavel', 'user_id', 'estados_id'];

    public function estado(){

        return $this->hasOne('App\Estado', 'id', 'estados_id');
    }

}
