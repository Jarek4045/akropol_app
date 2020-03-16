<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class PoliticiansToParties extends Model {

	protected $fillable = ['politician_id', 'partie_id', 'start_date', 'expiration_date'];

    protected $table = 'politicians_to_parties';

    public $timestamps = false;

    // public function politician(){
    // 	 return $this->hasOne('App\Modules\Models\Politicians', 'politician_id', 'id');
    // }

    // public function partie(){
    // 	 return $this->hasOne('App\Modules\Models\Parties', 'parties_id', 'id');
    // }

}