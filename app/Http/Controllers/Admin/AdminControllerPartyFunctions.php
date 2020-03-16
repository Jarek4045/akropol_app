<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\PartyFunctions;
use App\Http\Requests\Admin\PartyFunctions\AddNewPartyFunctionRequest;
use App\Http\Requests\Admin\PartyFunctions\EditPartyFunctionRequest;
use App\Http\Requests\Admin\PartyFunctions\DeletePartyFunctionRequest;


class AdminControllerPartyFunctions extends Controller
{
	protected $redirectTo = 'admin/partyfunctions';

    public function getPartyFunctionsList(){

    	$partyFunctions = $this->getPartyFunctions();

        return view('admin.party_functions.party_functions_list')
		        		->with('partyFunctions', $partyFunctions);
    }

    protected function getPartyFunctions()
	{
		return PartyFunctions::get();
	}

	public function addNewPartyFunction(AddNewPartyFunctionRequest $request)
	{

		$input = Input::all();
		$partyFunction = new PartyFunctions($input);
		$partyFunction->save();

		return redirect($this->redirectTo);
	}

	public function editPartyFunction(EditPartyFunctionRequest $request)
	{

		$partyFunction = PartyFunctions::find($request->party_function_id);

		if($partyFunction){

			$input = Input::all();
		    $partyFunction->fill($input);
		    $partyFunction->save();
		}

		return redirect($this->redirectTo);
	}

	public function deletePartyFunction(DeletePartyFunctionRequest $request)
	{
		$partyFunction = PartyFunctions::find($request->party_function_id);
		$partyFunction->delete();

		return redirect($this->redirectTo);
	}
}
