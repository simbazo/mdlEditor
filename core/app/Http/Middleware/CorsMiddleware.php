<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
       $domains = ['http://localhost:4200','http://localhost:8100','http://mobile.appenberg.co.za:8100','http://mobile.appenberg.co.za']; 

        if(isset($request->server()['HTTP_ORIGIN'])){
            $origin = $request->server()['HTTP_ORIGIN'];

            if(in_array($origin, $domains)){
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Methods: PUT,POST,DELETE,GET,PATCH,OPTIONS');
                header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
            }
        }
        return $next($request);

    }
}
