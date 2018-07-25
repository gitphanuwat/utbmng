<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model  {

	protected $table = 'infos';

	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }

}
