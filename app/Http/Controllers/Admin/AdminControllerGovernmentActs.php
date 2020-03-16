<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\GovernmentActs;
use App\Http\Requests\Admin\GovernmentActs\AddNewGovernmentActRequest;
use App\Http\Requests\Admin\GovernmentActs\EditGovernmentActRequest;
use App\Http\Requests\Admin\GovernmentActs\DeleteGovernmentActRequest;


class AdminControllerGovernmentActs extends Controller
{
	protected $redirectTo = 'admin/governmentactslist';

    public function getGovernmentActsList(){

    	$governmentActs = $this->getGovernmentActs();

        return view('admin.government_acts.government_acts_list')
		        		->with('governmentActs', $governmentActs);
    }

    protected function getGovernmentActs()
	{
		return GovernmentActs::get();
	}

	public function addNewGovernmentAct(AddNewGovernmentActRequest $request)
	{

		$input = Input::all();
		$governmentAct = new GovernmentActs($input);
		$governmentAct->save();

		return redirect($this->redirectTo);
	}

	public function editGovernmentAct(EditGovernmentActRequest $request)
	{

		$governmentAct = GovernmentActs::find($request->government_act_id);

		if($governmentAct){

			$input = Input::all();
		    $governmentAct->fill($input);
		    $governmentAct->save();
		}

		return redirect($this->redirectTo);
	}

	public function deleteGovernmentAct(DeleteGovernmentActRequest $request)
	{
		$governmentAct = GovernmentActs::find($request->government_act_id);
		$governmentAct->delete();

		return redirect($this->redirectTo);
	}
}
