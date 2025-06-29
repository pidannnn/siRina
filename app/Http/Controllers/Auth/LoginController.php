<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // app/Http/Controllers/Auth/LoginController.php
public function showLoginForm()
{
    return view('auth.login'); // Pastikan file ini ada di resources/views/auth/login.blade.php
}
protected $redirectTo = '/dashboard'; // Hanya berlaku setelah login sukses
}
