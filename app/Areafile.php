<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areafile extends Model
{
  //protected $table = 'areafiles';
  protected $garded = ['id'];

	public function area()
  {
    return $this->belongsTo('App\Area');
  }
}
