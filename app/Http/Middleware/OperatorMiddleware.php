<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && auth()->user()->isOperator()) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'You do not have operator access.');
    }
}