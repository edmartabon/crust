<?php

namespace Crust\Middlewares;

use Closure;
use Config;
use Crust\Contracts\HumanInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Request;

class Crust
{
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     *
     * @return void
     */
    public function __construct(Auth $auth, HumanInterface $human)
    {
        Config::set(['auth.providers.users.model' => 'Crust\Models\Users']);
        $this->auth = $auth;
        $this->human = $human;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param  string[]  ...$guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $auth = $this->authenticate($guards);

        if ($auth) {
            return $next($request);
        }
        
        return response()->json(['unAuthorized'], 401);
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param array $guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     *
     * @return void
     */
    protected function authenticate(array $guards)
    {
        $guards = array_map('strtolower', $guards);

        if ($this->auth->check()) {
            if (empty($guards)) {
                return $this->auth->authenticate();
            }

            return $this->atmosphere($guards);
            exit;
        }

        return $this->unAuthorized();
    }

    private function atmosphere(array $guards)
    {
        $humanRoles = array_map('strtolower', $this->human->getHumanRole());
        $humanBan = $this->human->getHumanBan();

        if (in_array('*', $humanRoles)) {
            return $this->auth->authenticate();
        }

        foreach ($guards as $guard) {
            if (in_array(substr(trim($guard), 1), $humanBan)) {
                return $this->unAuthorized();
            }
        }

        foreach ($guards as $guard) {
            if ($this->isRole($guard)) {
                if (in_array(trim($guard), $humanRoles)) {
                    return $this->auth->authenticate();
                }
            } else {
                $guard = substr(trim($guard), 1);
                $permit = array_map('strtolower', $this->human->getHumanPermit());

                if (in_array($guard, $permit)) {
                    return $this->auth->authenticate();
                }

                foreach ($this->human->getAllRole() as $role) {
                    if (in_array(strtolower($role->role_name), $humanRoles)) {
                        if (in_array($guard, $role->permit_codes->permit)) {
                            return $this->auth->authenticate();
                        }
                    }
                }
            }
        }

        return $this->unAuthorized();
    }

    /**
     * Check if guard is role or permit.
     *
     * @return bool
     */
    private function isRole($guard)
    {
        return strpos($guard, '~') !== false ? false : true;
    }

    /**
     * Move to specific route if authentication fail.
     *
     * @return void
     */
    private function unAuthorized()
    {
        return false;
    }
}
