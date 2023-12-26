<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Mail\DatHangEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function getHome()
    {
        return view('home');
    }
    public function getSanPham($tenloai_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.sanpham');
    }

    public function getSanPham_ChiTiet($tenloai_slug = '', $tensanpham_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.sanpham_chitiet');
    }

    public function getBaiViet($tenchude_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.baiviet');
    }

    public function getBaiViet_ChiTiet($tenchude_slug = '', $tieude_slug = '')
    {
        // Bổ sung code tại đây
        return view('frontend.baiviet_chitiet');
    }
    public function getGioHang()
    {
        // Bổ sung code tại đây
        return view('frontend.giohang');
    }

    public function getGioHang_Them($tensanpham_slug = '')
    {
        // Bổ sung code tại đây
        return redirect()->route('frontend.home');
    }

    public function getGioHang_Xoa($row_id)
    {
        // Bổ sung code tại đây
        return redirect()->route('frontend.giohang');
    }

    public function getGioHang_Giam($row_id)
    {
        // Bổ sung code tại đây
        return redirect()->route('frontend.giohang');
    }

    public function getGioHang_Tang($row_id)
    {
        // Bổ sung code tại đây
        return redirect()->route('frontend.giohang');
    }

    public function postGioHang_CapNhat(Request $request)
    {
        // Bổ sung code tại đây
        return redirect()->route('frontend.giohang');
    }

    public function getTuyenDung()
    {
        return view('frontend.tuyendung');
    }

    public function getLienHe()
    {
        return view('frontend.lienhe');
    }

    // Trang đăng ký dành cho khách hàng
    public function getDangKy()
    {
        return view('user.dangky');
    }

    // Trang đăng nhập dành cho khách hàng
    public function getDangNhap()
    {
        return view('user.dangnhap');
    }

    public function getDatHangDemo()
    {
        //them don hang
        $donhang = new DonHang();
        $donhang->user_id = Auth::user()->id;
        $donhang->tinhtrang_id = 1;
        $donhang->dienthoaigiaohang = '0123456789';
        $donhang->diachigiaohang = 'An Giang';
        $donhang->save();

<<<<<<< HEAD
        //them don hang chi tiet
        $dhct = new DonHang_ChiTiet();
        $dhct->donhang_id = $donhang->id;
        $dhct->sanpham_id = 5;
        $dhct->soluongban = 1;
        $dhct->dongiaban = 1000000;
        $dhct->save();

        $dhct = new DonHang_ChiTiet();
        $dhct->donhang_id = $donhang->id;
        $dhct->sanpham_id = 6;
        $dhct->soluongban = 2;
        $dhct->dongiaban = 2000000;
        $dhct->save();

        Mail::to(Auth::user()->email)->send(new DatHangEmail($donhang));
        return redirect()->route('donhang');
=======
        $donhang_chitiet->soluongban = 1;
        $donhang_chitiet->dongiaban = 350000;
        $donhang_chitiet->save();
        // Gởi email
        Mail::to(Auth::user()->email)->send(new DatHangThanhCongEmail($donhang));
        
        return redirect()->route('frontend');
>>>>>>> eb0564399e36730454d1328ad4e78b4dc47a6a2f
    }
}
