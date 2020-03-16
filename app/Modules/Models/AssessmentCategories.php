<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentCategories extends Model {

	protected $fillable = ['name'];

    protected $table = 'assessment_categories';

    public $timestamps = false;

}