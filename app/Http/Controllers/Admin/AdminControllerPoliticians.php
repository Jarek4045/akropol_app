<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\Politicians;
use App\Http\Requests\Admin\Politicians\AddNewPoliticianRequest;
use App\Http\Requests\Admin\Politicians\EditPoliticianRequest;
use App\Http\Requests\Admin\Politicians\DeletePoliticianRequest;


class AdminControllerPoliticians extends Controller
{
	protected $redirectTo = 'admin/politicianslist';

    public function getPoliticiansList(){

    	$politicians = $this->getPoliticians();

        return view('admin.politicians.politicians_list')
		        		->with('politicians', $politicians);
    }

    protected function getPoliticians()
	{
		return Politicians::get();
	}

	public function addNewPolitician(AddNewPoliticianRequest $request)
	{

		$input = Input::all();
		$politicians = new Politicians($input);
		$politicians->save();

		return redirect($this->redirectTo);
	}

	public function editPolitician(EditPoliticianRequest $request)
	{

		$politicians = Politicians::find($request->politician_id);

		if($politicians){

			$input = Input::all();
		    $politicians->fill($input);
		    $politicians->save();
		}

		return redirect($this->redirectTo);
	}

	public function deletePolitician(DeletePoliticianRequest $request)
	{
		$politicians = Politicians::find($request->politician_id);
		$politicians->delete();

		return redirect($this->redirectTo);
	}
}
