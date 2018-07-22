<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model  {

	protected $fillable = ['area_id', 'headname', 'firstname', 'lastname', 'address', 'tel'
, 'email'];
	protected $garded = ['id'];


	public function expertlist()
  {
    return $this->hasMany('App\Expertlist');
  }

	public function area()
  {
    return $this->belongsTo('App\Area');
  }

}
