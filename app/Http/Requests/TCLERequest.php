<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class TCLERequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

        //apenas médicos podem realizar tcle
        return (Auth::user()->type == "Médico") ? true : false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'paciente' => 'required|min:3',
            'prontuario' => 'required',
            'data_nascimento' => 'required',
            'rg',
            'orgao',
            'uf',
            'diagnostico',
            'procedimento',
            'anestesia',
            'responsavel',
            'parentesco_responsavel',
            'rg_responsavel',
            'cpf_responsavel'
		];
	}

}
