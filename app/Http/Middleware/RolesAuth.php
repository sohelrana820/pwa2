<?php
/** @noinspection ALL */

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;
use Closure;

/**
 * Class RolesAuth
 * @package App\Http\Middleware
 */
class RolesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $authUser = auth()->user();

        if ($authUser->userRole->role->role_slug === Role::SUPER_ADMIN) {
            // Redirect to authorized action
            return $next($request);
        }

        Session::flash('error', 'You\'re not permitted for this action!');

        // Redirect to login
        return redirect()->back();
    }
}
