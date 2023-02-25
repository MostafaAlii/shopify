<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class CheckGuard {
    public function handle(Request $request, Closure $next) {
        // get second segment of the


       if(!get_guard()->check()) {
           return redirect()->route(get_login_view())->withErrors(['error' => 'You are not logged in!']);
         }
        /*if(!get_guard()->check()) {
            return redirect()->route(get_login_view())->withErrors(['error' => 'You are not logged in!']);

        }*/



        /*$guard = get_guard();
        if(!$guard->check()){
            return redirect()->route(get_login_view())->withErrors(['error' => 'You are not logged in!']);
        }*/
        return $next($request);
    }
}
