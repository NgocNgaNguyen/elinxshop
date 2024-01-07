<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getHome()
    {
        return view('admin.home');
    }
    public function LoaiSanPham()
    {
        return view('admin.loaisanpham');
    }
    public function SanPham()
    {
        return view('admin.sanpham');
    }

}
