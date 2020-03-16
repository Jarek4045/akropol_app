<?php namespace App\Http\Requests\Admin\GovernmentActs;

use Lang;
use App\Http\Requests\Request;

class EditGovernmentActRequest extends Request {

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
			'name' => 'required|max:255',
		];
	}

	public function attributes()
	{
	    return[
	        'name' => Lang::get('validation.attributes.government_acts_name')
	    ];

	}
}
