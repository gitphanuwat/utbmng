<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model  {

	//protected $fillable = ['researcher_id', 'title', 'file', 'cload'];
	//protected $garded = ['id'];
	protected $table = 'docs';


	public function research()
  {
    return $this->belongsTo('App\Research');
  }

}
