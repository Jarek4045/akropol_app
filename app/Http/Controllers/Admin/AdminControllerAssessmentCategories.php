<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Modules\Models\AssessmentCategories;
use App\Http\Requests\Admin\AssessmentCategories\AddNewAssessmentCategorieRequest;
use App\Http\Requests\Admin\AssessmentCategories\EditAssessmentCategorieRequest;
use App\Http\Requests\Admin\AssessmentCategories\DeleteAssessmentCategorieRequest;


class AdminControllerAssessmentCategories extends Controller
{
	protected $redirectTo = 'admin/assessmentcategorieslist';

    public function getAssessmentCategoriesList(){

    	$assessmentCategories = $this->getAssessmentCategories();

        return view('admin.assessment_categories.assessment_categories_list')
		        		->with('assessmentCategories', $assessmentCategories);
    }

    protected function getAssessmentCategories()
	{
		return AssessmentCategories::get();
	}

	public function addNewAssessmentCategorie(AddNewAssessmentCategorieRequest $request)
	{

		$input = Input::all();
		$assessmentCategorie = new AssessmentCategories($input);
		$assessmentCategorie->save();

		return redirect($this->redirectTo);
	}

	public function editAssessmentCategorie(EditAssessmentCategorieRequest $request)
	{

		$assessmentCategorie = AssessmentCategories::find($request->assessment_categorie_id);

		if($assessmentCategorie){

			$input = Input::all();
		    $assessmentCategorie->fill($input);
		    $assessmentCategorie->save();
		}

		return redirect($this->redirectTo);
	}

	public function deleteAssessmentCategorie(DeleteAssessmentCategorieRequest $request)
	{
		$assessmentCategorie = AssessmentCategories::find($request->assessment_categorie_id);
		$assessmentCategorie->delete();

		return redirect($this->redirectTo);
	}
}
