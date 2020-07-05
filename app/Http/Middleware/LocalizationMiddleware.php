<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        App::setLocale('ar');
        session()->put('locale', 'ar');
        return $next($request);
    }
}
