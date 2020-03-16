<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\GovernmentCadences;
use App\Http\Requests\Admin\GovernmentCadences\AddNewGovernmentCadenceRequest;
use App\Http\Requests\Admin\GovernmentCadences\EditGovernmentCadenceRequest;
use App\Http\Requests\Admin\GovernmentCadences\DeleteGovernmentCadenceRequest;


class AdminControllerGovernmentCadences extends Controller
{
	protected $redirectTo = 'admin/governmentcadenceslist';

    public function getGovernmentCadencesList(){

    	$governmentCadences = $this->getGovernmentCadences();

        return view('admin.government_cadences.government_cadences_list')
		        		->with('governmentCadences', $governmentCadences);
    }

    protected function getGovernmentCadences()
	{
		return GovernmentCadences::get();
	}

	public function addNewGovernmentCadence(AddNewGovernmentCadenceRequest $request)
	{

		$input = Input::all();
		$governmentCadences = new GovernmentCadences($input);
		$governmentCadences->save();

		return redirect($this->redirectTo);
	}

	public function editGovernmentCadence(EditGovernmentCadenceRequest $request)
	{

		$governmentCadences = GovernmentCadences::find($request->government_cadence_id);

		if($governmentCadences){

			$input = Input::all();
		    $governmentCadences->fill($input);
		    $governmentCadences->save();
		}

		return redirect($this->redirectTo);
	}

	public function deleteGovernmentCadence(DeleteGovernmentCadenceRequest $request)
	{
		$governmentCadences = GovernmentCadences::find($request->government_cadence_id);
		$governmentCadences->delete();

		return redirect($this->redirectTo);
	}
}
