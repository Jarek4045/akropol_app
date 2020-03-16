<?php namespace App\Http\Requests\Admin\PoliticianToPartie;

use Lang;
use App\Http\Requests\Request;

class AddNewPoliticianToPartieRequest extends Request {

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
			'politician_id' => 'required|integer|exists:politicians,id',
			'partie_id' => 'required|integer|exists:parties,id',
			'start_date' => 'required|date_format:Y-m-d H:i:s',
			'expiration_date' => 'required|date_format:Y-m-d H:i:s',
		];
	}

}
