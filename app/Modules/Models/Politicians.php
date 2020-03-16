<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class Politicians extends Model {

	protected $fillable = ['name'];

	protected $guarded = [];

    protected $table = 'politicians';

    public $timestamps = false;

}