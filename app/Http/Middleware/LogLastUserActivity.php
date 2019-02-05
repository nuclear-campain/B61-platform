<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * Class LogLastUserActivity
 *
 * @package App\Http\Middleware
 */
class LogLastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $expiresAt = now()->addMinutes(5);
            Cache::put('user-is-online-' . auth()->user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
