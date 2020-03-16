<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\PoliticiansToParties;
use App\Modules\Models\Politicians;
use App\Modules\Models\Parties;
use App\Http\Requests\Admin\PoliticianToPartie\AddNewPoliticianToPartieRequest;
use App\Http\Requests\Admin\PoliticianToPartie\EditPoliticianToPartieRequest;
use App\Http\Requests\Admin\PoliticianToPartie\DeletePoliticianToPartieRequest;


class AdminControllerPoliticiansToParties extends Controller
{
	protected $redirectTo = 'admin/politicianstopartieslist';

    public function getPoliticiansToPartiesList(){

    	$politiciansToParties = $this->getPoliticiansToParties();

    	$politiciansArray = $this->getPoliticiansArray();
    	$partiesArray = $this->getPartiesArray();

        return view('admin.politicians_to_parties.politicians_to_parties_list')
		        		->with('politiciansToParties', $politiciansToParties)
		        		->with('politiciansArray', $politiciansArray)
		        		->with('partiesArray', $partiesArray);
    }

    protected function getPoliticiansToParties()
	{
		//return PoliticiansToParties::get();

		$result = DB::table('politicians_to_parties')
						->select('politicians_to_parties.id',
									'politicians.name as politician_name', 
									'politicians_to_parties.politician_id as politician_id', 
									'parties.name as partie_name', 
									'politicians_to_parties.partie_id as partie_id',
									'politicians_to_parties.start_date as start_date', 
									'politicians_to_parties.expiration_date')

						->leftJoin('politicians', 'politicians.id', '=', 'politicians_to_parties.politician_id')
						->leftJoin('parties', 'parties.id', '=', 'politicians_to_parties.partie_id')
						->get();

		return $result;
	}

	protected function getPoliticiansArray()
	{
		return Politicians::pluck('name', 'id');
	}

	protected function getPartiesArray()
	{
		return Parties::pluck('name', 'id');
	}

	public function addNewPoliticianToPartie(AddNewPoliticianToPartieRequest $request)
	{

		$input = Input::all();
		$politiciansToParties = new PoliticiansToParties($input);
		$politiciansToParties->save();

		return redirect($this->redirectTo);
	}

	public function editPoliticianToPartie(EditPoliticianToPartieRequest $request)
	{

		$politiciansToParties = PoliticiansToParties::find($request->politician_to_partie_id);

		if($politiciansToParties){

			$input = Input::all();
		    $politiciansToParties->fill($input);
		    $politiciansToParties->save();
		}

		return redirect($this->redirectTo);
	}

	public function deletePoliticianToPartie(DeletePoliticianToPartieRequest $request)
	{
		$politiciansToParties = PoliticiansToParties::find($request->politician_to_partie_id);
		$politiciansToParties->delete();

		return redirect($this->redirectTo);
	}
}
