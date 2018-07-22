<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Creative extends Model  {

	protected $table = 'creatives';

	public function researcher()
  {
    return $this->belongsTo('App\Researcher');
  }

}
