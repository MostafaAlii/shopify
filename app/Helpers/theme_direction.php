<?php
use Illuminate\Support\Facades\Request;
function bottomStartDirectionClass() {
    $class = 'bottom-start';
    if (app()->getLocale() == 'ar') {
        $class = 'bottom-end';
    }
    return $class;
}

function bottomEndDirectionClass() {
    $class = 'bottom-end';
    if (app()->getLocale() == 'ar') {
        $class = 'bottom-start';
    }
    return $class;
}

function rightStartDirectionClass() {
    $class = 'right-start';
    if (app()->getLocale() == 'ar') {
        $class = 'left-start';
    }
    return $class;
}

function leftStartDirectionClass() {
    $class = 'left-start';
    if (app()->getLocale() == 'ar') {
        $class = 'right-start';
    }
    return $class;
}
if(!function_exists('active_menu')){
    function active_menu($link){
        if (preg_match('/'.$link.'/i', Request::segment(3))) {
			return ['show', 'show'];
		} else {
			return ['', ''];
		}
    }
}