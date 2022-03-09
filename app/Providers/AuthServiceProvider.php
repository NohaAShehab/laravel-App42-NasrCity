<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Policies\PostPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // define your own gates
        Gate::define("isuser",function ($user){
            return $user->role==="user";
        });
        Gate::define("isadmin",function ($user){
            return $user->role==="admin";
        });
        Gate::define("ismanger",function ($user){
            return $user->role==="manager";
        });
        ### update post gate
        Gate::define("update_post",function ($user, $post){
            return $user->id === $post->user->id;
        });




    }
}
