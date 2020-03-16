<?php namespace App\Http\Requests\Admin\GovernmentCadences;

use Lang;
use App\Http\Requests\Request;

class AddNewGovernmentCadenceRequest extends Request {

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
			'name' => 'required|max:255',
			'description' => 'required|max:255',
			'start_date' => 'required|date_format:Y-m-d H:i:s',
			'expiration_date' => 'required|date_format:Y-m-d H:i:s',
		];
	}

	public function attributes()
	{
	    return[
	        'name' => Lang::get('validation.attributes.government_cadences_name')
	    ];

	}

}
