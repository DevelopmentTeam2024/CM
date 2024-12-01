<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Exception;

class checkUserErrors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Proceed with the request
            return $next($request);
        } catch (Exception $e) {
            // Log the error
            Log::error('User error: ' . $e->getMessage(), [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'user_id' => optional($request->user())->id, // If user is authenticated
                'input' => $request->all(),
            ]);

            // Optionally send the error to the developer via email
            Mail::raw("An error occurred: " . $e->getMessage(), function ($message) {
                $message->to('mohamed.adel@daniaair.com')
                    ->subject('User Error Report');
            });

            // Optionally, redirect to an error page or return a response
            return response()->view('errors.custom_error', [], 500);
        }
    }
}