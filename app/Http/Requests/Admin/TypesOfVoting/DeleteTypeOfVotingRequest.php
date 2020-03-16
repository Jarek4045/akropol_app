<?php namespace App\Http\Requests\Admin\TypesOfVoting;

use App\Http\Requests\Request;

class DeleteTypeOfVotingRequest extends Request {

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
		];
	}

}
