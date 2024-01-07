@extends('layouts.app')

@section('content')
<div class="pagetitle">
   <h1>Sửa loại sản phẩm</h1>
</div>
<div class="container">
   <section class="section dashboard">
      <div class="row">
         <div class="col-lg-8">
            <div class="row">
               <form action="{{ route('admin.loaisanpham.sua', ['id' => $loaisanpham->id]) }}" method="post">
                  @csrf

                  <div class="mb-3">
                     <label class="form-label" for="tenloai">Tên loại</label>
                  </div>
                  <input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai"
                     name="tenloai" value="{{ $loaisanpham->tenloai }} " />
                  @error('tenloai')
                  <div class="invalid-feedback"> <strong>{{$message}}</strong> </div>
                  @enderror

                  <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Cập nhật</button>
            </div>
            </form>
         </div>
      </div>
   </section>
</div>
@endsection