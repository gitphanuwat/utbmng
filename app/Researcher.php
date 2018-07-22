<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Researcher extends Model  {

/*
	protected $fillable = ['university_id', 'headname', 'firstname', 'lastname', 'address', 'tel'
, 'email'];
	protected $garded = ['id'];
*/
	protected $table = 'researchers';


	public function expertlist()
  {
    return $this->hasMany('App\Expertlist');
  }

	public function university()
  {
    return $this->belongsTo('App\University');
  }

	public function research()
  {
    return $this->hasMany('App\Research');
  }

	public function creative()
	{
		return $this->hasMany('App\Creative');
	}

}
