<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\Politicians;
use App\Modules\Models\PartyFunctions;
use App\Modules\Models\PartyFunctionsToPoliticians;
use App\Http\Requests\Admin\PartyFunctionsToPoliticians\AddNewPartyFunctionToPoliticianRequest;
use App\Http\Requests\Admin\PartyFunctionsToPoliticians\EditPartyFunctionToPoliticianRequest;
use App\Http\Requests\Admin\PartyFunctionsToPoliticians\DeletePartyFunctionToPoliticianRequest;


class AdminControllerPartyFunctionsToPoliticians extends Controller
{
	protected $redirectTo = 'admin/governmentcadencestopoliticianslist';

    public function getPartyFunctionsToPoliticiansList(){

    	$partyFunctionsToPoliticians = $this->getPartyFunctionsToPoliticians();

    	$politiciansArray = $this->getPoliticiansArray();
    	$partyFunctionsArray = $this->getPartyFunctionsArray();

        return view('admin.party_functions_to_politicians.party_functions_to_politicians_list')
		        		->with('partyFunctionsToPoliticians', $partyFunctionsToPoliticians)
		        		->with('politiciansArray', $politiciansArray)
		        		->with('partyFunctionsArray', $partyFunctionsArray);
    }

    protected function getPartyFunctionsToPoliticians()
	{
		$result = DB::table('party_functions_to_politicians')
						->select('party_functions_to_politicians.id',
									'politicians.name as politician_name', 
									'party_functions_to_politicians.politician_id as politician_id', 
									'party_functions.name as party_function_name', 
									'party_functions_to_politicians.party_function_id as party_function_id')

						->leftJoin('politicians', 'politicians.id', '=', 'party_functions_to_politicians.politician_id')
						->leftJoin('party_functions', 'party_functions.id', '=', 'party_functions_to_politicians.party_function_id')
						->get();

		return $result;
	}

	protected function getPoliticiansArray()
	{
		return Politicians::pluck('name', 'id');
	}

	protected function getPartyFunctionsArray()
	{
		return PartyFunctions::pluck('name', 'id');
	}

	public function addNewPartyFunctionToPolitician(AddNewPartyFunctionToPoliticianRequest $request)
	{

		$input = Input::all();
		$partyFunctions = new PartyFunctionsToPoliticians($input);
		$partyFunctions->save();

		return redirect($this->redirectTo);
	}

	public function editPartyFunctionToPolitician(EditPartyFunctionToPoliticianRequest $request)
	{

		$partyFunctions = PartyFunctionsToPoliticians::find($request->government_cadence_to_politician_id);

		if($partyFunctions){

			$input = Input::all();
		    $partyFunctions->fill($input);
		    $partyFunctions->save();
		}

		return redirect($this->redirectTo);
	}

	public function deletePartyFunctionToPolitician(DeletePartyFunctionToPoliticianRequest $request)
	{
		$partyFunctions = PartyFunctionsToPoliticians::find($request->government_cadence_to_politician_id);
		$partyFunctions->delete();

		return redirect($this->redirectTo);
	}
}
