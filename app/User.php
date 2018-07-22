<?php

namespace App;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'users';

     public function savePicture($fileName) {
          Session::put('profile_tab', 'avatar');
          $this->picture = $fileName;
          $this->save();
     }

     public function deletePicture() {
          Session::put('profile_tab', 'avatar');
          $this->picture = null;
          $this->save();
     }

     public function changeProfile(Request $request) {
         //$this->firstname = $request->input('firstname');

         if ($request->input('new_password_confirmation')) {
             $this->password = Hash::make($request->input('new_password_confirmation'));
         }
         if ($request->input('email')) {
            Session::put('profile_tab', 'email');
            $this->email = $request->input('email');
       }
         $this->save();
     }

   public function role()
 	{
 		return $this->belongsTo('App\Role');
 	}

public function amphur()
 {
   return $this->belongsTo('App\Amphur');
 }
 public function organize()
{
  return $this->belongsTo('App\Organize');
}
public function vilage()
{
 return $this->belongsTo('App\Vilage');
}

  public function getStatusAttribute()
  {
      return Auth::user()->role->slug;
  }
}
