<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model  {

	protected $table = 'groups';

	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }
}
