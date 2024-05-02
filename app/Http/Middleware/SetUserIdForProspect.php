<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetUserIdForProspect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Récupérer l'ID de l'utilisateur connecté
        $userId = auth()->id();

        // Ajouter l'ID de l'utilisateur à la requête
        $request->merge(['user_id' => $userId]);

        return $next($request);
    }
}
