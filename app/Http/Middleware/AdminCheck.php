<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheck
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->check() && $this->auth->user()->is_admin){
            return $next($request);
        } else{

            if($request->ajax()){
                return response('Unauthorized.', 401);
            } else {
                return redirect('/');
            }
        }
        
    }
}
