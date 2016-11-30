<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
class Authenticate
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
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        if($request->path() == 'order-detail') return $next($request);
        
        if(auth()->user()->type != 'admin'){
            $message = 'Permiso denegado: Solo los administradores pueden entrar a esta sección';
            return redirect()->route('index')->with('message', $message);
        }

        return $next($request);
    }
}
