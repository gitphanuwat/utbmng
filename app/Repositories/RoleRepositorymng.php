<?php namespace App\Repositories;

use App\Role;

class RoleRepositorymng {

	protected $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	public function all()
	{
		return $this->role->whereIn ('slug',['organize','operator'])->get();
	}

	public function update($inputs)
	{
		foreach ($inputs as $key => $value)
		{
			$role = $this->role->where('slug', $key)->firstOrFail();

			$role->title = $value;

			$role->save();
		}
	}

	public function getAllSelect()
	{
		$select = $this->all()->pluck('title', 'id');

		return compact('select');
	}

}
