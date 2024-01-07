@extends('layouts.app')

@section('content')
<div class="pagetitle">
   <h1>Thêm loại sản phẩm</h1>
</div>
<div class="container">
   <section class="section dashboard">
      <div class="row">
         <div class="col-lg-8">
            <div class="row">
               <form action="{{ route('admin.loaisanpham.them') }}" method="post">
                  @csrf

                  <div class="mb-3">
                     <label class="form-label" for="tenloai">Tên loại</label>
                     <input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai"
                        name="tenloai" value="{{ old('tenloai') }}" />
                     @error('tenloai')
                     <div class="invalid-feedback"> <strong>{{$message}}</strong> </div>
                     @enderror

                  </div>

                  <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Thêm vào CSDL</button>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection