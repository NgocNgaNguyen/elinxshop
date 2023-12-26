@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Đăng xuất</h2>
                        <p>Bạn có chắc chắn muốn đăng xuất?</p>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection