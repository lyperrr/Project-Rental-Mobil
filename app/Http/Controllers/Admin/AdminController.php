<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function mobil()
    {
        return view('admin.mobil');
    }

    public function laporan()
    {
        return view('admin.laporan');
    }

    public function pelanggan()
    {
        return view('admin.pelanggan');
    }

    public function penyewaan()
    {
        return view('admin.penyewaan');
    }
}