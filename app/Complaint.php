<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model  {

	protected $table = 'complaints';
	public function organize()
	{
    return $this->belongsTo('App\Organize');
  }
}
