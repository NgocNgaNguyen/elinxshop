<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Mail\DatHangEmail;
use App\Mail\DatHangThanhCongEmail;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\SanPham;
use App\Models\ChuDe;
use App\Models\NguoiDung;
use App\Models\BaiViet;
use App\Models\BaiViet_ChiTiet;
use App\Models\TuyenDung;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function getGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->stateless()
                ->user();
        } catch (Exception $e) {
            return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }
        $existingUser = NguoiDung::where('email', $user->email)->first();
        if ($existingUser) {
            // Nếu người dùng đã tồn tại thì đăng nhập
            Auth::login($existingUser, true);
            return redirect()->route('user.home');
        } else {
            // Nếu chưa tồn tại người dùng thì thêm mới
            $newUser = NguoiDung::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => Str::before($user->email, '@'),
                'password' => Hash::make('elinxshop@2023'), // Gán mật khẩu tự do
            ]); // Sau đó đăng nhập
            Auth::login($newUser, true);
            return redirect()->route('user.home');
        }
    }

    public function getHome()
    {
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        return view('frontend.home', compact('loaisanpham', 'hangsanxuat'));
    }
    public function getSanPham($tenloai_slug = '')
    {
        // Lấy thông tin loại sản phẩm dựa trên tenloai_slug
        $loaisanpham = LoaiSanPham::where('tenloai_slug', $tenloai_slug)->first();

        // Nếu không tìm thấy loại sản phẩm, có thể xử lý tùy chọn như hiển thị trang lỗi hoặc chuyển hướng
        if (!$loaisanpham) {
            abort(404); // Trả về trang 404 Not Found
        }

        // Lấy danh sách sản phẩm thuộc loại sản phẩm
        $dssp = SanPham::where('loaisanpham_id', $loaisanpham->id)->get();

        // Truyền loại sản phẩm và danh sách sản phẩm vào view bằng compact
        return view('frontend.sanpham', compact('loaisanpham', 'dssp'));
    }
    public function getSanPham_ChiTiet($tenloai_slug = '', $tensanpham_slug = '')
    {

        // Tìm thông tin sản phẩm dựa trên các tham số nhận được
        $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
            ->where('loaisanpham.tenloai_slug', $tenloai_slug)
            ->where('sanpham.tensanpham_slug', $tensanpham_slug)
            ->first();

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$sanpham) {
            abort(404); // Trả về trang 404 Not Found
        }

        return view('frontend.sanpham_chitiet', compact('sanpham'));
    }
    public function getBaiViet($tenchude_slug = '')
    {
        if (empty($tenchude_slug)) {
            $title = 'Bài viết';
            $baiviet = BaiViet::where('kichhoat', 1)
                ->where('kiemduyet', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $chude = ChuDe::where('tenchude_slug', $tenchude_slug)->firstOrFail();
            $title = $chude->tenchude;
            $baiviet = BaiViet::where('kichhoat', 1)
                ->where('kiemduyet', 1)
                ->where('chude_id', $chude->id)
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        return view('frontend.baiviet', compact('title', 'baiviet'));
    }
    public function getBaiViet_ChiTiet($tenchude_slug = '', $tieude_slug = '')
    {
        $tieude_id = explode('.', $tieude_slug);
        $tieude = explode('-', $tieude_id[0]);
        $baiviet_id = $tieude[count($tieude) - 1];
        $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->where('id', $baiviet_id)
            ->firstOrFail();
        if (!$baiviet)
            abort(404);
        // Cập nhật lượt xem
        $daxem = 'BV' . $baiviet_id;
        if (!session()->has($daxem)) {
            $orm = BaiViet::find($baiviet_id);
            $orm->luotxem = $baiviet->luotxem + 1;
            $orm->save();
            session()->put($daxem, 1);
        }
        $baivietcungchuyemuc = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->where('chude_id', $baiviet->chude_id)
            ->where('id', '!=', $baiviet_id)
            ->orderBy('created_at', 'desc')
            ->take(4);
        return view('frontend.baiviet_chitiet', compact('baiviet', 'baivietcungchuyemuc'));
    }
    public function getGioHang()
    {
        if (Cart::count() > 0)
            return view('frontend.giohang');
        else
            return view('frontend.giohangrong');
    }
    public function getGioHang_Them($tensanpham_slug = '')
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'qty' => 1,
            'price' => $sanpham->dongia,
            'weight' => 0,
            'options' => [
                'image' => $sanpham->hinhanh
            ]
        ]);
        return redirect()->route('frontend.home');
    }
    public function getGioHang_Xoa($row_id)
    {
        Cart::remove($row_id);
        return redirect()->route('frontend.giohang');
    }
    public function getGioHang_Giam($row_id)
    {
        $row = Cart::get($row_id);
        // Nếu số lượng là 1 thì không giảm được nữa
        if ($row->qty > 1) {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect()->route('frontend.giohang');
    }
    public function getGioHang_Tang($row_id)
    {
        $row = Cart::get($row_id);
        // Không được tăng vượt quá 10 sản phẩm
        if ($row->qty < 10) {
            Cart::update($row_id, $row->qty + 1);
        }
        return redirect()->route('frontend.giohang');
    }
    public function postGioHang_CapNhat(Request $request)
    {
        foreach ($request->qty as $row_id => $quantity) {
            if ($quantity <= 0)
                Cart::update($row_id, 1);
            else if ($quantity > 10)
                Cart::update($row_id, 10);
            else
                Cart::update($row_id, $quantity);
        }
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
    public function postDangXuat(Request $request)
    {
        // Bổ sung code tại đây
        Auth::logout();
        return redirect()->route('admin.home');
    }
    // Trong Controller
    public function getSearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $sanpham = SanPham::where('tensanpham', 'like', '%' . $keyword . '%')
                            ->with('loaisanpham') 
                            ->paginate(8);
                        
        return view('frontend.search', ['sanpham' => $sanpham]);
    }
}
