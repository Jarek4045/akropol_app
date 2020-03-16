<?php namespace App\Http\Requests\Admin\Parties;

use Lang;
use App\Http\Requests\Request;

class EditPartieRequest extends Request {

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
			'partie_id' => 'required|integer|exists:parties,id',
			'name' => 'required|max:255'
		];
	}

	public function attributes()
	{
	    return[
	        'name' => Lang::get('validation.attributes.partie_name')
	    ];

	}

}
