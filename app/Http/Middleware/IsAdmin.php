<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless(auth()->check(), 401);
        // for now: only the very first user is admin
        if ($request->user()->id !== 1) {
            abort(403, 'Access denied.');
        }
        return $next($request);
    }
}
