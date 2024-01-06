@extends('layouts.frontend')
@section('title', 'Tìm kiếm')
@section('content')
<div class="container mt-4 mb-grid-gutter">
    <div class="bg-faded-info rounded-3 py-4">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="px-4 pe-sm-0 ps-sm-5">
                    <span class="badge bg-danger">Khuyến mãi đặc biệt</span>
                    <h3 class="mt-4 mb-1 text-body fw-light">Sản phẩm mới 100%</h3>
                    <h2 class="mb-1">PC Bản Mới</h2>
                    <p class="h5 text-body fw-light">Số lượng sản phẩm có hạn!</p>
                    <a class="btn btn-accent" href="#">Xem chi tiết<i class="ci-arrow-right fs-ms ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-7"><img src="{{ asset('public/img/offer.jpg') }}" /></div>
        </div>
    </div>
</div>

<div class="container mt-4 mb-grid-gutter">
    @if ($sanpham->total() > 0)
        <h2 class="title text-center">Kết quả tìm kiếm</h2>
        <p class="text-center">Tìm thấy {{ $sanpham->total() }} kết quả:</p>
        <div class="row pt-2 mx-n2">
            @forelse($sanpham as $sp)
                @if ($sp->loaisanpham)
                    <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                        <a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
                            <img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}" />
                        </a>
                        <div class="card-body py-2">
                            <a class="product-meta d-block fs-xs pb-1" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug]) }}">{{ $sp->loaisanpham->tenloai }}</a>
                            <h3 class="product-title fs-sm">
                                <a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{ $sp->tensanpham }}</a>
                            </h3>
                            <div class="d-flex justify-content-between">
                                <div class="product-price">
                                    <span class="text-accent">{{ number_format($sp->dongia, 0, ',', '.') }}<small>đ</small></span>
                                </div>
                                <div class="star-rating">
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star"></i>
                                </div>
                                <!-- Thêm các thông tin khác về sản phẩm nếu cần -->
                            </div>
                        </div>
                        <div class="card-body card-body-hidden">
                            <a class="btn btn-primary btn-sm d-block w-100 mb-2" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sp->tensanpham_slug]) }}">
                                <i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
                            </a>
                        </div>
                        <!-- Các nút và chức năng khác nếu cần -->
                    </div>
                    <hr class="d-sm-none">
                </div>
                @endif
            @empty
                <!-- Không tìm thấy sản phẩm nào -->
            @endforelse
        </div>
        <!-- Hiển thị phân trang -->
        <div class="d-flex justify-content-center mt-4">
        {{ $sanpham->links('vendor.pagination.bootstrap-4-custom') }}
        </div>
    @else
        <h2 class="title text-center">Kết quả tìm kiếm</h2>
        <p class="text-center">Không tìm thấy sản phẩm nào.</p>
    @endif
</div>
@endsection