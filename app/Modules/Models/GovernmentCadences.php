<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentCadences extends Model {

	protected $fillable = ['name', 'description', 'start_date', 'expiration_date'];

    protected $table = 'government_cadences';

    public $timestamps = false;

}