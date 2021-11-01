<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCheckMiddleware
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
        // get user_id of post
        $user_id = Post::find(request("id"))->user_id;

        if (auth()->user()->is_premium == "1" || auth()->user()->is_admin == "1" || auth()->user()->id == $user_id) {
            //              premium                             admin          if current user id and post user_id equal
            return $next($request);
        } else {
            return back();
        }
    }
}
