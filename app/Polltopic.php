<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Polltopic extends Model  {

	protected $table = 'polltopics';
	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }
	public function pollanswer()
	{
		return $this->hasMany('App\Pollanswer');
	}
}
