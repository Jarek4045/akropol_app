<?php namespace App\Http\Requests\Admin\TypesOfVoting;

use Lang;
use App\Http\Requests\Request;

class EditTypeOfVotingRequest extends Request {

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
			'type_of_voting_id' => 'required|integer|exists:types_of_voting,id',
			'name' => 'required|max:255',
		];
	}

	public function attributes()
	{
	    return[
	        'name' => Lang::get('validation.attributes.type_of_voting_name')
	    ];

	}
}
