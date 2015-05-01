<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEmpresaRequest extends Request {

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
			'nome'	=> 'required|unique:empresa|max:200',
			'cnpj'	=> 'required|unique:empresa', // deve ser unico na tab empresa
			//'telefone'	=> 'required',
			'email'	=> 'email',
		];
	}

}
