<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Get the selected language from session
        $language = session(key: 'language');

        // Set the current language
        App::setLocale($language);

        // Log the updated locale for verification
        Log::info('Locale set to: '.$language.' (Selected language: '.$language.')');

        return $next($request);

    }
}
