<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/iconelinx.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/logologo.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/logo16.png') }}" />

<<<<<<< Updated upstream
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    



    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" />
    <link href="{{ asset('path/to/bootstrap-icons.css') }}" rel="stylesheet">
    
=======
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset ('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
>>>>>>> Stashed changes
    @yield('css')
    <link href="{{ asset ('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('public/img/logo16.png') }}" alt="">
                <span class="d-none d-lg-block">eLinxShop</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">1</span>
                    </a><!-- Icon Thông báo  -->

                    <ul class="dropdown-menu dropdown-menu-end dro_pdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 1 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
                    </ul><!-- End Notification Dropdown Items -->
                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">1</span>
                    </a><!-- Icon tin nhắn-->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 1 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset ('NiceAdmin/assets/img/messages-2.jpg') }}" alt=""
                                    class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>
                    </ul><!-- End Messages Dropdown Items -->
                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">
                    @guest
                    @if (Route::has('login'))
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('login') }}">
                        <img src="{{ asset('public/img/avatar.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block toggle">Đăng nhập</span>
                    </a>
                    @endif
                    @else
                    <a id="navbarDropdown" class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{ asset('public/img/avatar.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                                <i class="bi bi-person"></i>
                                <span>Hồ sơ cá nhân</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                                <i class="bi bi-gear"></i>
                                <span>Cài đặt</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-header" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>Đăng xuất</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Trang chủ</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">DANH MỤC QUẢN LÝ</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Quản lý cửa hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.sanpham') }}">
                            <i class="bi bi-circle"></i><span>Sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.loaisanpham') }}">
                            <i class="bi bi-circle"></i><span>Loại sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.hangsanxuat') }}">
                            <i class="bi bi-circle"></i><span>Hãng sản xuất</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Quản lý đơn hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.donhang') }}">
                            <i class="bi bi-circle"></i><span>Đơn hàng</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tinhtrang') }}">
                            <i class="bi bi-circle"></i><span>Tình trạng</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý Khách hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.nguoidung') }}">
                            <i class="bi bi-circle"></i><span>Tài khoản</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>Quản lý bài viết</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.chude') }}">
                            <i class="bi bi-circle"></i><span>Chủ đề</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.baiviet') }}">
                            <i class="bi bi-circle"></i><span>Bài viết</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.binhluanbaiviet') }}">
                            <i class="bi bi-circle"></i><span>Bình luận</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Thống kê</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="charts-chartjs.html">
                            <i class="bi bi-circle"></i><span>Doanh thu</span>
                        </a>
                    </li>
                    <li>
                        <a href="charts-apexcharts.html">
                            <i class="bi bi-circle"></i><span>Khách hàng</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
        </ul>
    </aside>
    <main id="main" class="main">
        <div class="container">
            <section class="section dashboard">
                <div class="row">
                    @yield('content')
                </div>
            </section>
        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="{{ asset ('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>
    @yield('javascript')
    <!-- Template Main JS File -->
    <script src="{{ asset ('NiceAdmin/assets/js/main.js') }}"></script>
</body>

</html>