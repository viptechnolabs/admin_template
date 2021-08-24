<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $result = Auth::check();
        if ($result) {
            if (Auth::user()->type == 1) {
                return redirect()->route('admin.index');
            } elseif (Auth::user()->type == 0) {
                return redirect()->route('index');
            }
        }
        return $next($request);
    }
}
