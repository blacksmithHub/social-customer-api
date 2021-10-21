<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\User;
use App\Resources\Contracts\Auth\UserResourceInterface;

class PasswordGrantAuthorization
{
    /**
     * Instantiate dependencies
     * 
     * @param \App\Resources\Contracts\Auth\UserResourceInterface $userResource
     * @return void
     */
    public function __construct(UserResourceInterface $userResource)
    {
        $this->userResource = $userResource;
    }

    /**
     * Handle an incoming request.
     * Verify Request token via password grant verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) abort(403, 'Unauthorized');

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => sprintf('Bearer %s', $token),
        ];

        $response = $this->userResource->show($headers, 1, []);

        $user = new User(collect($response)->toArray());

        // login the user via auth
        auth()->login($user);

        // login the user via request
        $request->setUserResolver(function () use ($user) {
            return $user;
        });

        return $next($request);
    }
}
