<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $plan = 'premium'): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // special = VIP, has full access
        if ($user->plan_type === 'special') {
            return $next($request);
        }

        if ($plan === 'premium' && $user->plan_type !== 'premium') {
            return redirect()->route('dashboard')->with('error', 'You need a premium plan to access this feature.');
        }

        return $next($request);
    }
}
