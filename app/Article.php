<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	protected $fillable = ['title', 'body', 'published_at'];
	protected $garded = ['id'];

	protected $dates = ['published_at'];

	//แปลงค่า attributes
	//public function setPublishedAtAttribute($date)
	//{
	//	$this->attributes['published_at'] = Carbon::parse($date)->subDay();
	//}

}
