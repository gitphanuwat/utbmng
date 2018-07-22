<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model  {

	protected $table = 'updates';
	public function user()
  {
    return $this->belongsTo('App\User');
  }

}
