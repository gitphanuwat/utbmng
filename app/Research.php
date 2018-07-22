<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model  {

/*
	protected $fillable = ['taggroup_id', 'researcher_id', 'title_th', 'title_eng', 'propose', 'keyword', 'abstract'
, 'contributor'];
	protected $garded = ['id'];
*/
	protected $table = 'researchs';


	public function doc()
  {
    return $this->hasMany('App\Doc');
  }

	public function researcher()
  {
    return $this->belongsTo('App\Researcher');
  }

}
