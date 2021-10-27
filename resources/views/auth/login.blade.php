@extends('Layouts.User')
<!-- for active -->
@php $page='Login'; @endphp
@section('contents')
<div class="">

    @if (Route::has('login'))
    <div class="container-login">
        <div class="box-login">
            <div class="box-right">
                <img src="images/bg/dev.png" alt="">
            </div>
            <div class="box-left">
                <form action="{{ route('login') }}" method="post">
                    <div class="title mb-4 text-center">ລະບົບສະມາຊິກ</div> @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{$message}}</strong>
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="">ເບີໂທ :</label>
                        <input value="2091116465" required type="text" name="Tel" class="form-input"
                            placeholder="20 xxxx xxxx">
                    </div>
                    @error('Tel')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror

                    <div class="mb-4 ">
                        <label for="">ລະຫັດຜ່ານ :</label>
                        <input type="password" value="11112222" name="password" required class="form-input"
                            placeholder="ລະຫັດຜ່ານ">
                    </div>
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror

                    @csrf
                    <div class="mb-5">
                        <button name="submit" class="btn-submit" type="submit">ເຂົ້າສູ່ລະບົບ</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
    @endsection
