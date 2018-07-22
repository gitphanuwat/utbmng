<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model  {

	protected $table = 'persons';

	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }

}
