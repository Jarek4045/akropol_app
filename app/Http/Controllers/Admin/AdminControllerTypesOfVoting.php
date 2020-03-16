<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\TypesOfVoting;
use App\Http\Requests\Admin\TypesOfVoting\AddNewTypeOfVotingRequest;
use App\Http\Requests\Admin\TypesOfVoting\EditTypeOfVotingRequest;
use App\Http\Requests\Admin\TypesOfVoting\DeleteTypeOfVotingRequest;


class AdminControllerTypesOfVoting extends Controller
{
	protected $redirectTo = 'admin/typesofvotinglist';

    public function getTypesOfVotingList(){

    	$typesOfVoting = $this->getTypesOfVoting();

        return view('admin.types_of_voting.types_of_voting_list')
		        		->with('typesOfVoting', $typesOfVoting);
    }

    protected function getTypesOfVoting()
	{
		return TypesOfVoting::get();
	}

	public function addNewTypeOfVoting(AddNewTypeOfVotingRequest $request)
	{

		$input = Input::all();
		$typeOfVoting = new TypesOfVoting($input);
		$typeOfVoting->save();

		return redirect($this->redirectTo);
	}

	public function editTypeOfVoting(EditTypeOfVotingRequest $request)
	{

		$typeOfVoting = TypesOfVoting::find($request->type_of_voting_id);

		if($typeOfVoting){

			$input = Input::all();
		    $typeOfVoting->fill($input);
		    $typeOfVoting->save();
		}

		return redirect($this->redirectTo);
	}

	public function deleteTypeOfVoting(DeleteTypeOfVotingRequest $request)
	{
		$typeOfVoting = TypesOfVoting::find($request->type_of_voting_id);
		$typeOfVoting->delete();

		return redirect($this->redirectTo);
	}
}
