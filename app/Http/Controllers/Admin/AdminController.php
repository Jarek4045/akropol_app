<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Session;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddNewUserRequest;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Admin\DeleteUserRequest;
use App\Modules\Models\Roles;
use App\Modules\Models\Users;
use App\Modules\Models\RoleUser;
use App\Modules\Utils\Utils;


class AdminController extends Controller
{
	protected $redirectTo = 'admin/userslist';
	protected $accessRolesIds = [3];

	public function getPanel(){

        return view('admin.users.Admin_panel');
    }

    public function getUsersList(){

    	$rolesList = Roles::wherein('id', $this->accessRolesIds)
						->pluck('name', 'id');

    	$users = $this->getUsers();

        return view('admin.users.users_list')
		        		->with('users', $users)
		        		->with('rolesList', $rolesList);
    }

    protected function getUsers()
	{
		return DB::table('users')
    					->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.updated_at', 'role_user.role_id', 'roles.name as role_name')
						->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
						->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
						->whereIn('role_user.role_id', $this->accessRolesIds)
						->get();
	}

    public function loginAsOtherUser($userId)
	{
		Session::set('loginasid', Auth::user()->id);

		Auth::loginUsingId($userId);
		Session::set('isAdmin', true);
		return redirect('home');
	}

	public function addNewUser(AddNewUserRequest $request)
	{
        if(!$this->checkAccessToRole($request->role_id)){
        	return $this->redirectoToRolesError();
        }

		$input = Input::all();
		$user = new Users($input);

		$password = $this->generatePassword();
		$user->password = bcrypt($password);
		$user->save();

		$roleUser = RoleUser::firstOrNew(['user_id' => $user->id, 'role_id' => $request->role_id]);
		$roleUser->user_id = $user->id;
		$roleUser->role_id = $request->role_id;
		$roleUser->save();

		return redirect($this->redirectTo);
	}

	public function editUser(EditUserRequest $request)
	{
		if(!$this->checkAccessToRole($request->role_id)){
        	return $this->redirectoToRolesError();
        }

		$user = Users::find($request->user_id); 

		if($user){

			$input = Input::all();
		    $user->fill($input);
		    $user->save();
		}

		return redirect($this->redirectTo);
	}

	public function deleteUser(DeleteUserRequest $request)
	{
		$user = Users::find($request->user_id);

		if(!$this->checkAccessToRole($user->roleUser->role_id)){
        	return $this->redirectoToRolesError();
        }

		$user->delete();

		return redirect($this->redirectTo);
	}

	protected function generatePassword() 
	{
		return Utils::generatePassword();
    }

    protected function checkAccessToRole($role_id) 
	{
		$rolesIdsArray = Roles::wherein('id', $this->accessRolesIds)->pluck('id')->toArray();

		if(!in_array($role_id, $rolesIdsArray)) {
            return false;
        }

        return true;
    }

    protected function redirectoToRolesError() 
	{
		return Redirect::back()->withErrors(['Nie masz dostępu do tej roli użytkownika użytkownika!']);
    }
}
