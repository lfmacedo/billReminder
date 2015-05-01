<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateBillRequest extends Request {

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
			'payment_date' 	=> 'required|date_format:"d/m/Y"',
			'obs'			=> 'required|max: 200',
			'status' 		=> 'integer',
			'empresa_id' 	=> 'required|integer'
		];
	}

}
