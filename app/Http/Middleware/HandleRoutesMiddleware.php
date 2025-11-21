<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class HandleRoutesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Inertia::share('routes', function () {
            $user = Auth::user();
            /* Make a collection of the available routes for the user */
            $routes = collect(Route::getRoutes())->filter(function (\Illuminate\Routing\Route $route) use ($user) {
                /* If the user is site admin, enable everything. */
                if ($user && $user->is_site_admin) {
                    return true;
                }

                /* Get all the middlewares of the route */
                $middlewares = $route->gatherMiddleware();

                /* Disable no-name routes */
                if (! $route->getName() || ! in_array('web', $middlewares)) {
                    return false;
                }

                /* Disable when user is not authenticated and page requires */
                if (! $user && in_array('auth', $middlewares)) {
                    return false;
                }

                /* Disable when user is authenticated and page requires else */
                if ($user && in_array('guest', $middlewares)) {
                    return false;
                }

                foreach ($middlewares as $middleware) {
                    if (Str::startsWith($middleware, 'can:')) {
                        [$_, $ability] = explode(':', $middleware, 2);
                        if (! $user || ! $user->can($ability)) {
                            return false;
                        }
                    }
                }

                return true;
            });

            $output = [];

            foreach ($routes as $route) {
                try {
                    $output[$route->getName()] = [
                        'methods' => $route->methods(),
                        'url' => route($route->getName()),
                        'uri' => $route->uri(),
                    ];
                } catch (\Exception $e) {
                    $output[$route->getName()] = [
                        'methods' => $route->methods(),
                        'url' => null,
                        'uri' => $route->uri(),
                        'parameters' => collect($route->parameterNames())->mapWithKeys(function ($name) use ($route) {
                            return [
                                $name => optional($route->signatureParameters())->firstWhere('name', $name)?->isDefault() ?? false,
                            ];
                        })->toArray(),
                    ];
                }
            }

            return $output;
        });

        return $next($request);
    }
}
