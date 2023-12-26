<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = SanPham::all();
        return view('sanpham.danhsach', compact('sanpham'));
    }
    public function getThem()
    {
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('sanpham.them', compact('loaisanpham', 'hangsanxuat'));
    }
    public function postThem(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'loaisanpham_id' => ['required'],
            'hangsanxuat_id' => ['required'],
            'tensanpham' => ['required', 'string', 'max:191', 'unique:sanpham'],
            'soluong' => ['required', 'numeric'],
            'dongia' => ['required', 'numeric'],
            // 'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);
        $orm = new SanPham();
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        if ($request->hasFile('hinhanh'))
            $orm->hinhanh = $request->hinhanh;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();
        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('sanpham');
    }
    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('sanpham.sua', compact('sanpham', 'loaisanpham', 'hangsanxuat'));
    }
    public function postSua(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'loaisanpham_id' => ['required'],
            'hangsanxuat_id' => ['required'],
            'tensanpham' => ['required', 'string', 'max:191', 'unique:sanpham,tensanpham,' . $id],
            'soluong' => ['required', 'numeric'],
            'dongia' => ['required', 'numeric'],
            // 'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);
        $orm = SanPham::find($id);
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        if ($request->hasFile('hinhanh'))
            $orm->hinhanh = $request->hinhanh;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();
        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('sanpham');
    }
    public function getXoa($id)
    {
        $orm = SanPham::find($id);
        $orm->delete();
        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('sanpham');
    }
}