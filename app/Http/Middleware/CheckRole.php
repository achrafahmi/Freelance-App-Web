<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next)
{
    if (Auth::check() ) {

        if(Auth::user()->role == '1'){
        
            return $next($request);
        }
        else{
            return redirect('home');
        }
    }
    else{
        return redirect('/login');
    }

    //abort(403, 'Unauthorized');
}

}
