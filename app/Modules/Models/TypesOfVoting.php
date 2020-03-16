<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class TypesOfVoting extends Model {

	protected $fillable = ['name'];

    protected $table = 'types_of_voting';

    public $timestamps = false;

}