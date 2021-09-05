<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Definitions\HttpStatusCode;
use App\Exceptions\Problems\InvalidAPIKeysException;

class CheckAPIKey
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
        $presentedAPIKEY = $request->header('api-key');
        if (array_search($presentedAPIKEY, config('security.apikeys')) === false || empty($presentedAPIKEY))
            throw new InvalidAPIKeysException($presentedAPIKEY);

        return $next($request);
    }
}
