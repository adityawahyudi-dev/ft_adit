<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->get('lang') ?? session('locale', 'id');

        if (!in_array($locale, ['id', 'en'])) {
            $locale = 'id';
        }

        if ($request->has('lang')) {
            session(['locale' => $locale]);
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
