<?php namespace App\Modules\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

	protected $fillable = ['name', 'email', 'created_at', 'updated_at'];

	protected $guarded = [];

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];

    public function roleUser(){
    	 return $this->hasOne('App\Modules\Models\RoleUser', 'user_id', 'id');
    }
}