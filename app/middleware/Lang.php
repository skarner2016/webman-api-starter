<?php

namespace app\middleware;

use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

class Lang implements MiddlewareInterface
{
    public function process(Request $request, callable $next): Response
    {
        $defaultLocale  = config('translation.locale');
        $fallbackLocale = config('translation.fallback_locale');
        $locale         = $request->header('Content-Language');
        $locale         = $locale && in_array($locale, $fallbackLocale) ? $locale : $defaultLocale;
        
        locale($locale);
        
        return $next($request);
    }
    
}
