<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPrimiumStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->query('user', 'guest');
        $manager = app('subscription-checker');
        if (! $manager->isPrimiumUser($user)) {
            return response('Access Denied', 403);
        }

        return $next($request);
    }
}
