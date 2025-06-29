<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // app/Http/Controllers/Auth/RegisterController.php
public function showRegistrationForm()
{
    return view('auth.register'); // Pastikan file ini ada di resources/views/auth/register.blade.php
}
}
