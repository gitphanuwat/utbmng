<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model  {

/*
	protected $fillable = ['taggroup_id', 'researcher_id', 'title_th', 'title_eng', 'propose', 'keyword', 'abstract'
, 'contributor'];
	protected $garded = ['id'];
*/
	protected $table = 'papers';

	public function researcher()
  {
    return $this->belongsTo('App\Researcher');
  }

}
