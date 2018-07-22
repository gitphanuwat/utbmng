<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;

use App\User, App\Role;

class UserRepositoryope extends BaseRepository
{
	protected $role;
	public function __construct(
		User $user,
		Role $role)
	{
		$this->model = $user;
		$this->role = $role;
	}

  private function save($user, $inputs)
	{
		if(isset($inputs['seen']))
		{
			$user->seen = $inputs['seen'] == 'true';
		} else {

			$user->username = $inputs['username'];
			$user->email = $inputs['email'];

			if(isset($inputs['role'])) {
				$user->role_id = $inputs['role'];
			} else {
				$role_user = $this->role->where('slug', 'user')->first();
				$user->role_id = $role_user->id;
			}
		}

		$user->save();
	}

	public function index($n, $role)
	{
		$idu = Auth::user()->area_id;
		if($role != 'total')
		{
			return $this->model
			->with('role')
			->where('area_id',$idu)
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})
			->oldest('id')
			->latest()
			->paginate($n);
		}

		return $this->model
		->with('role')
		->where('area_id',$idu)
		->oldest('id')
		->latest()
		->paginate($n);
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function count($role = null)
	{
		$idu = Auth::user()->area_id;

		if($role)
		{
			return $this->model
			->whereHas('role', function($q) use($role) {
				$q->whereSlug($role);
			})
			->where('area_id',$idu)
			->count();
		}

		return $this->model->count();
	}

	/**
	 * Count the users.
	 *
	 * @param  string  $role
	 * @return int
	 */
	public function counts()
	{
		$counts = [
			'Admin' => $this->count('Admin'),
			'Amphur' => $this->count('Amphur'),
			'Organize' => $this->count('Organize'),
			'Operator' => $this->count('Operator')
		];

		$counts['total'] = array_sum($counts);

		return $counts;
	}

	/**
	 * Create a user.
	 *
	 * @param  array  $inputs
	 * @param  int    $confirmation_code
	 * @return App\Models\User
	 */
	public function store($inputs, $confirmation_code = null)
	{
		$user = new $this->model;

		$user->password = bcrypt($inputs['password']);

		if($confirmation_code) {
			$user->confirmation_code = $confirmation_code;
		} else {
			$user->confirmed = true;
		}

		$this->save($user, $inputs);

		return $user;
	}

	/**
	 * Update a user.
	 *
	 * @param  array  $inputs
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function update($inputs, $user)
	{
		$user->seen = isset($inputs['confirmed']);

		$this->save($user, $inputs);
	}

	/**
	 * Get statut of authenticated user.
	 *
	 * @return string
	 */
	public function getStatut()
	{
		return session('statut');
	}

	/**
	 * Valid user.
	 *
     * @param  bool  $valid
     * @param  int   $id
	 * @return void
	 */
	public function valid($valid, $id)
	{
		$user = $this->getById($id);

		$user->valid = $valid == 'true';

		$user->save();
	}

	/**
	 * Destroy a user.
	 *
	 * @param  App\Models\User $user
	 * @return void
	 */
	public function destroyUser(User $user)
	{
		$user->comments()->delete();

		$user->delete();
	}

	/**
	 * Confirm a user.
	 *
	 * @param  string  $confirmation_code
	 * @return App\Models\User
	 */
	public function confirm($confirmation_code)
	{
		$user = $this->model->whereConfirmationCode($confirmation_code)->firstOrFail();

		$user->confirmed = true;
		$user->confirmation_code = null;
		$user->save();
	}

}
