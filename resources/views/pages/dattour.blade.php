@extends('layouts.index')

 @section('title')
     {{ $title }}
 @endsection


@section('content')
<!-- Begin Main Content Area -->
 @if(session('thongbao'))
            <div class="alert alert-success" style="text-align: center;">
                {{session('thongbao')}}
            </div>
    @endif
<main class="main-content">
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="" method="POST">
                        <div class="checkbox-form">
                            @csrf
                            <h3>Đặt tour</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                       <label>Số lượng người lớn <span>*</span></label>
                                        <input placeholder="Nhập số lượng người lớn" name="so_luong_nguoi_lon" value="{{ old('so_luong_nguoi_lon') }}" type="text">
                                         @error('so_luong_nguoi_lon')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>                               
                                  <div class="col-md-12">
                                    <div class="checkout-form-list">
                                       <label>Số lượng trẻ em<span class="required">*</span></label>
                                        <input placeholder="Nhập số lượng trẻ em" name="so_luong_tre_em" type="text" value="{{ old('so_luong_tre_em') }}">
                                         @error('so_luong_tre_em')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="order-button-payment">
                                    <input value="Đặt tour" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>{{ $chitiettour->tour }}</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">Giá người lớn:<strong class="product-quantity"></td>
                                        <td class="cart-product-total"><span class="amount">{{ currency_format($chitiettour->gia_nguoi_lon) }}</span></td>
                                    </tr>
                                     <tr class="cart_item">
                                        <td class="cart-product-name">Giá trẻ em:<strong class="product-quantity"></td>
                                        <td class="cart-product-total"><span class="amount">{{ currency_format($chitiettour->gia_tre_em) }}</span></td>
                                    </tr>
                                      <tr class="cart_item">
                                        <td class="cart-product-name">Thời gian:<strong class="product-quantity"></td>
                                        <td class="cart-product-total"><span class="amount">{{ $chitiettour->so_ngay }} ngày {{ $chitiettour->so_dem }} đêm</span></td>
                                    </tr>
                                    </tr>
                                      <tr class="cart_item">
                                        <td class="cart-product-name">Số lượng còn:<strong class="product-quantity"></td>
                                        <td class="cart-product-total"><span class="amount">{{ $chitiettour->so_luong_con }}</span></td>
                                    </tr>
                                      <tr class="cart_item">
                                        <td class="cart-product-name">Ngày khởi hành:<strong class="product-quantity"></td>
                                        <td class="cart-product-total"><span class="amount">{{ dinhDangNgayThang($chitiettour->ngay_di) }}</span></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                                    Hành trình
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>{{ $chitiettour->lich_trinh }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
      <!-- Main Content Area End Here -->
@endsection