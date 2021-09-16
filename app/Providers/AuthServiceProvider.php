<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\UserAuth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];
    
    /**
     * Register any authentication / authorization services.
     * Using binary data (a dword) we can use bitwise operations to check if a user is authorized.
     * 00000000000000000000000000000000 banned/unverified
     * 00000000000000000000000010000000 means they can read posts
     * 00000000000000000000000011111111 means they are an admin with full access
     * 00000000000000000000000000000001 means they are an admin with only admin access
     * with aliased class constants
     * UserAuth::readPost = 128
     * 
     * if $userAuthorization & auth::canPost === true { return $userAuthorization; }
     * true means they are allowed, false means they are not.
     * 
     * i.e. 00000000000000000000000000000001 & 11000000000011000000110000001101 = true
     * bitwise AND operation to verify the bit is set in both values.
     * @return boolean
     */

    public function boot()
    {
        $this->registerPolicies();
        //Violating DRY here i thinks
        //User groups
        Gate::define('isAdmin', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isAdmin;
            return $userAuthorization;
        });
        Gate::define('isModerator', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isModerator;
            return $userAuthorization;
        });
        Gate::define('isSubModerator', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isSubModerator;
            return $userAuthorization;
        });
        Gate::define('isEditor', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isEditor;
            return $userAuthorization;
        });
        Gate::define('isSubEditor', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isSubEditor;
            return $userAuthorization;
        });
        Gate::define('isUser', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isUser;
            return $userAuthorization;
        });
        Gate::define('isSubUser', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isSubUser;
            return $userAuthorization;
        });
        Gate::define('isUnverifiedUser', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isUnverifiedUser;
            return $userAuthorization;
        });
        Gate::define('isBanned', function ($user) {
            $userAuthorization = base64_decode($user->access) & UserAuth::isBanned;
            return $userAuthorization;
        });
    }
}
