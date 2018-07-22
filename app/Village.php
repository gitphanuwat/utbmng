<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model  {

	protected $table = 'villages';
	public function organize()
	 {
	   return $this->belongsTo('App\Organize');
	 }

}
