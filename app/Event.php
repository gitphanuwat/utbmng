<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model  {

	protected $table = 'events';
	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }
}
