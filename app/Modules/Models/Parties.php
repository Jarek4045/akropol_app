<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class Parties extends Model {

	protected $fillable = ['name'];

    protected $table = 'parties';

    public $timestamps = false;

}