<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model  {
	protected $table = 'downloads';
	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }
}
