<?php

namespace App\Http\Middleware;
use App\Log;

use Closure;

class MustBeLog
{
    public function handle($request, Closure $next)
    {
      $user = $request->user();
      $url = $_SERVER["REQUEST_URI"];
      if($user){
        $obj = new Log();
        $obj->user_id = $user->id;
        $obj->timeuser = date("Y-m-d h:i:s");
        $obj->module = $url;
        $check = $obj->save();
      }
      //if($check){
        return $next($request);
      //}
      //abort(403);
    }
}
