<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserBuy;
use App\Models\UserTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class logout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()) {
            $last_timer = UserTime::all()->where('user_id', Auth::user()->id)->where( 'last_logout', null)->first();
            $last_timer->update(['last_logout' => Carbon::now('CET')]);
        }
        return $next($request);
    }
}
