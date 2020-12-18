<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EnsureOneUser
{
    /**
     * Handle an incoming request.
     * Ensure there isn't more than a single user in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (DB::Table('users')->count() > 0) {
            return abort(403);
        }
        return $next($request);
    }
}
