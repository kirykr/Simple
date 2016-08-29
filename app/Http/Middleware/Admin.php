<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Entrust;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


       if(Entrust::hasRole('admin')  && Entrust::user()->can(['edit-user', 'create-user'])){
           return $next($request);
       }

       return redirect('/');

        // Check if a user is logged in.
        if (!$user = $request->user())
        {
            // If not, continue the request.
            return $next($request);
        }
        // Get the current route.
        $route = $request->route();
        // Get the current route actions.
        $actions = $route->getAction();
        // Check if we have any permissions to check.
        if (!$permissions = isset($actions['permissons']) ? $actions['permissons'] : null)
        {
            // No permissions to check, allow access.
            return $next($request);
        }
        // Fetch all of the users permissions.
        $userPermissions = array_fetch($user->permissions()->whereIn('name', (array) $permissions)->get()->toArray(), 'name');
        // Ensure that the required permissions are an array.
        $permissions = (array) $permissions;
        if (isset($actions['permissions_require_all']))
        {
            // If the user has EVERY permission required.
            if (count($permissions) == count($userPermissions))
            {
                // Allow the request.
                return $next($request);
            }
        } else {
            if (count($userPermissions) > 0)
            {
                // Allow the request.
                return $next($request);
            }
        }
        // Abort the request if we reach here.
        return abort(401);
    }

}
