<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model  {

	protected $table = 'tourists';
	public function organize()
	 {
	   return $this->belongsTo('App\Organize');
	 }

}
