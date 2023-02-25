<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthenticatedSessionController extends Controller {
    public function index() {
        return view('dashboard.auth.admin.login');
    }
}
