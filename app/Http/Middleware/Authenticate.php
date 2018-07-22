<?php

namespace App\Http\Middleware;
use App\Log;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        /*$user = $request->user();
        if($user){
          $obj = new Log();
          $obj->user_id = $user->id;
          $obj->timeuser = date("Y-m-d h:i:sa");
          $obj->module = $_SERVER["REQUEST_URI"];
          $check = $obj->save();
        }*/

        return $next($request);
    }
}
