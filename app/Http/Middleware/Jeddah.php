<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Jeddah
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = [];
        $jeddahUsers = [15, 14];
        $user = Auth::user();

        if ($user && in_array($user->id, $jeddahUsers)) {
            $data['users'] = $jeddahUsers;
            $data['branch'] = 'Jeddah';
            $data['role'] = ($user->id == 15) ? 'Manager' : 'Employee';
            session($data);
        }
        return $next($request);
    }
}