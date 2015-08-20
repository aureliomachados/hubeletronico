<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SecretariaMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

        if(Auth::user()->type !== "Secretária"){
            return redirect('home');
        }
		return $next($request);
	}

}
