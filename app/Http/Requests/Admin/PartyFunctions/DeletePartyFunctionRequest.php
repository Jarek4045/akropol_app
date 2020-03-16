<?php namespace App\Http\Requests\Admin\PartyFunctions;

use App\Http\Requests\Request;

class DeletePartyFunctionRequest extends Request {

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
			'party_function_id' => 'required|integer|exists:party_functions,id',
		];
	}

}
