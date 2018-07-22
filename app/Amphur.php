<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphur extends Model  {

	protected $table = 'amphurs';

	public function organize()
	{
    return $this->hasMany('App\Organize');
  }
	public function village()
	{
    return $this->hasMany('App\Village');
  }

}
