<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use App\Models\Ruangan;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data = [
            'userCount' => User::count(),
            'inventarisCount' => Inventaris::count(),
            // 'ruanganCount' => Ruangan::where('status', 'tersedia')->count()
        ];

        return view('admin.dashboard', compact('data'));
    }
    public function show()
    {
        $data = [
            'userCount' => User::count(),
            'inventarisCount' => Inventaris::count(),
            // 'ruanganCount' => Ruangan::where('status', 'tersedia')->count()
        ];

        return view('admin.dashboard', compact('data'));
    }
}