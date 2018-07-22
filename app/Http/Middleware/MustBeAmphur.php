<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAmphur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user = $request->user();
      if($user && $user->status == 'Amphur'){
        return $next($request);
      }
      abort(403);
    }
}
