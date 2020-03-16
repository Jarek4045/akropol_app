<?php namespace App\Http\Requests\Admin\GovernmentActs;

use App\Http\Requests\Request;

class DeleteGovernmentActRequest extends Request {

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
			'government_act_id' => 'required|integer|exists:government_acts,id',
		];
	}

}
