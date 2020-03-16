<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentCadencesToPoliticians extends Model {

	protected $fillable = ['government_cadence_id', 'politician_id'];

    protected $table = 'government_cadences_to_politicians';

    public $timestamps = false;


}