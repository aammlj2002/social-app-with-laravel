<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define("admin", function (User $user) {
            return $user->is_admin == "1";
        });
        Gate::define("admin_premium_user", function (User $user, $id) {
            // get user_id of that post
            $user_id = Post::find($id)->user_id;

            return $user->is_admin == "1" || $user->is_premium == "1" || $user->id == $user_id;
        });
    }
}
