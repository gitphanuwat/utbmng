<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Useful extends Model  {

	//protected $fillable = ['researcher_id', 'title', 'file', 'cload'];
	//protected $garded = ['id'];
	protected $table = 'usefuls';

	public function area()
  {
    return $this->belongsTo('App\Area');
  }
	public function problem()
  {
    return $this->belongsTo('App\Problem');
  }
	public function taggroup()
  {
    return $this->belongsTo('App\Taggroup');
  }
	public function research()
  {
    return $this->belongsTo('App\Research');
  }
	public function expert()
  {
    return $this->belongsTo('App\Expert');
  }
	public function creative()
  {
    return $this->belongsTo('App\Creative');
  }

}
