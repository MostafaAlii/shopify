<?php
use Illuminate\Support\Str;
if(!function_exists('admin_guard')){
    function admin_guard() {
        return auth('admin');
    }
}

if(!function_exists('get_user_data')) {
    function get_user_data() {
        $guards = ['admin', 'web'];
        foreach($guards as $guard){
            if(auth($guard)->check()){
                return auth($guard)->user();
            }
        }
        return null;
    }
}


if(!function_exists('get_guard_name')) {
    function get_guard_name() {
        $guards = ['admin', 'web'];
        foreach($guards as $guard){
            if(auth($guard)->check()){
                return $guard;
            }
        }
        return null;
    }
}

if (!function_exists('get_guard')) {
    function get_guard() {
        //$prefix = app('router')->getCurrentRoute()->getPrefix();
        $prefix = \request()->segment(2);
        $guard = get_guard_name();
        // check if the prefix is the same as the guard name and return it
        if ($prefix == $guard) {
            return $guard;
        }
        return $guard;
        //return $prefix;
    }
}

if (!function_exists('get_login_view')) {
    function get_login_view() {
        // use get_guard() to get the guard name
        $guard = get_guard();
        if ($guard == 'admin') {
            return 'admin.login';
        }

        return 'login';
    }
}


