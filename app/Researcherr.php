<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcherr extends Model  {

	protected $table = 'researchers';


	public function expertlist()
  {
    return $this->hasMany('App\Expertlist');
  }

	public function research()
  {
    return $this->hasMany('App\Research');
  }

	public function university()
  {
    return $this->belongsTo('App\University');
  }

}
