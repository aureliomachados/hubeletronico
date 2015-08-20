<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        //se o usuário possuir acesso de secretária e for diferente de guest(convidado).
        if(Auth::user()->type == "Secretária" && !(Auth::guest())){
            return true;
        }
        else{
            return false;
        }
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'crm' => 'alpha_dash|unique:users',
            'password' => 'required|confirmed|min:6',
		];
	}

}
