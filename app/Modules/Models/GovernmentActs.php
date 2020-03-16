<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentActs extends Model {

	protected $fillable = ['name'];

    protected $table = 'government_acts';

    public $timestamps = false;

}