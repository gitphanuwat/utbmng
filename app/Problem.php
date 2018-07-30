<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model  {

	protected $table = 'problems';

	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }
	
}
