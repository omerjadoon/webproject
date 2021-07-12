<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfAgreementAccept
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
    if(Auth::user()->businessdetail->agreement_status==0){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
