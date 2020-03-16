<?php namespace App\Http\Requests\Admin\GovernmentCadencesToPoliticians;

use Lang;
use App\Http\Requests\Request;

class EditGovernmentCadenceToPoliticianRequest extends Request {

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
			'government_cadence_to_politician_id' => 'required|integer|exists:government_cadences_to_politicians,id',
			'government_cadence_id' => 'required|integer|exists:government_cadences,id',
			'politician_id' => 'required|integer|exists:politicians,id',
		];
	}
}
