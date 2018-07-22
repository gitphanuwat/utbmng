<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertlist extends Model  {

	protected $fillable = ['expert_id', 'researcher_id', 'taggroup_id', 'title_th', 'title_eng', 'detail'];
	protected $garded = ['id'];


	public function taggroup()
	{
		return $this->belongsTo('App\Taggroup');
	}
	public function researcher()
	{
		return $this->belongsTo('App\Researcher');
	}
	public function expert()
	{
		return $this->belongsTo('App\Expert');
	}
}
