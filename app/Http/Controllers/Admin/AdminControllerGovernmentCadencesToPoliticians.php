<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\Politicians;
use App\Modules\Models\GovernmentCadences;
use App\Modules\Models\GovernmentCadencesToPoliticians;
use App\Http\Requests\Admin\GovernmentCadencesToPoliticians\AddNewGovernmentCadenceToPoliticianRequest;
use App\Http\Requests\Admin\GovernmentCadencesToPoliticians\EditGovernmentCadenceToPoliticianRequest;
use App\Http\Requests\Admin\GovernmentCadencesToPoliticians\DeleteGovernmentCadenceToPoliticianRequest;


class AdminControllerGovernmentCadencesToPoliticians extends Controller
{
	protected $redirectTo = 'admin/governmentcadencestopoliticianslist';

    public function getGovernmentCadencesToPoliticiansList(){

    	$governmentCadences = $this->getGovernmentCadencesToPoliticians();

    	$politiciansArray = $this->getPoliticiansArray();
    	$governmentCadencesArray = $this->getGovernmentCadencesArray();

        return view('admin.government_cadences_to_politicians.government_cadences_to_politicians_list')
		        		->with('governmentCadences', $governmentCadences)
		        		->with('politiciansArray', $politiciansArray)
		        		->with('governmentCadencesArray', $governmentCadencesArray);
    }

    protected function getGovernmentCadencesToPoliticians()
	{
		$result = DB::table('government_cadences_to_politicians')
						->select('government_cadences_to_politicians.id',
									'politicians.name as politician_name', 
									'government_cadences_to_politicians.politician_id as politician_id', 
									'government_cadences.name as government_cadence_name', 
									'government_cadences_to_politicians.government_cadence_id as government_cadence_id')

						->leftJoin('politicians', 'politicians.id', '=', 'government_cadences_to_politicians.politician_id')
						->leftJoin('government_cadences', 'government_cadences.id', '=', 'government_cadences_to_politicians.government_cadence_id')
						->get();

		return $result;
	}

	protected function getPoliticiansArray()
	{
		return Politicians::pluck('name', 'id');
	}

	protected function getGovernmentCadencesArray()
	{
		return GovernmentCadences::pluck('name', 'id');
	}

	public function addNewGovernmentCadenceToPolitician(AddNewGovernmentCadenceToPoliticianRequest $request)
	{

		$input = Input::all();
		$governmentCadence = new GovernmentCadencesToPoliticians($input);
		$governmentCadence->save();

		return redirect($this->redirectTo);
	}

	public function editGovernmentCadenceToPolitician(EditGovernmentCadenceToPoliticianRequest $request)
	{

		$governmentCadence = GovernmentCadencesToPoliticians::find($request->government_cadence_to_politician_id);

		if($governmentCadence){

			$input = Input::all();
		    $governmentCadence->fill($input);
		    $governmentCadence->save();
		}

		return redirect($this->redirectTo);
	}

	public function deleteGovernmentCadenceToPolitician(DeleteGovernmentCadenceToPoliticianRequest $request)
	{
		$governmentCadence = GovernmentCadencesToPoliticians::find($request->government_cadence_to_politician_id);
		$governmentCadence->delete();

		return redirect($this->redirectTo);
	}
}
