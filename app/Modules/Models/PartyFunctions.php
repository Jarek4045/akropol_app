<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class PartyFunctions extends Model {

	protected $fillable = ['name'];

    protected $table = 'party_functions';

    public $timestamps = false;

}