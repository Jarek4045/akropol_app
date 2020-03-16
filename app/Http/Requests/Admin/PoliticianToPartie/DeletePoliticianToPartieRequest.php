<?php namespace App\Http\Requests\Admin\PoliticianToPartie;

use App\Http\Requests\Request;

class DeletePoliticianToPartieRequest extends Request {

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
			'politician_to_partie_id' => 'required|integer|exists:politicians_to_parties,id',
		];
	}

}
