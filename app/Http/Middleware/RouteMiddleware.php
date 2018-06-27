<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class NeutralRoute extends \Tymon\JWTAuth\Middleware\BaseMiddleware
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, \Closure $next)
   {
       $token = $this->auth->setRequest($request)->getToken();

       if($token){
           try {
               $user = $this->auth->authenticate($token);
           } catch (TokenExpiredException $e) {
               return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);
           } catch (JWTException $e) {
               return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);
           }
           if($user){
               $this->events->fire('tymon.jwt.valid', $user);
           }
       }

       return $next($request);
   }
}
