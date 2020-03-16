<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\Parties;
use App\Http\Requests\Admin\Parties\AddNewPartieRequest;
use App\Http\Requests\Admin\Parties\EditPartieRequest;
use App\Http\Requests\Admin\Parties\DeletePartieRequest;


class AdminControllerParties extends Controller
{
	protected $redirectTo = 'admin/partieslist';

    public function getPartiesList(){

    	$parties = $this->getParties();

        return view('admin.parties.parties_list')
		        		->with('parties', $parties);
    }

    protected function getParties()
	{
		return Parties::get();
	}

	public function addNewPartie(AddNewPartieRequest $request)
	{

		$input = Input::all();
		$parties = new Parties($input);
		$parties->save();

		return redirect($this->redirectTo);
	}

	public function editPartie(EditPartieRequest $request)
	{

		$parties = Parties::find($request->partie_id);

		if($parties){

			$input = Input::all();
		    $parties->fill($input);
		    $parties->save();
		}

		return redirect($this->redirectTo);
	}

	public function deletePartie(DeletePartieRequest $request)
	{
		$parties = Parties::find($request->partie_id);
		$parties->delete();

		return redirect($this->redirectTo);
	}
}
