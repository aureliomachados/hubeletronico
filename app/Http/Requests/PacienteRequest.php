<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PacienteRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nome' => 'required',
            'prontuario' => 'required|unique:pacientes',
            'data_nascimento' => 'required|date'
		];
	}

}
