@extends('Layouts.User')

@section('contents')
<div class="container">
    <div class="box-search">
        <form action="" method="post">
            <div class="search-group">
                <div class="form-group">
                    <input type="text" class="form-input" placeholder="ປ້ອນຄຳຄົ້ນຫາ..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn-search" type="button" id="button-addon2">Button</button>
                </div>
            </div>
        </form>
    </div>
    <div class="link-course">
        <div class="all-course">
            <a class="btn-courses {{($active == '') ? 'active': ''}}" href="">ທັງໝົດ</a>
        </div>
        <div class="all-course">
            <a class="btn-courses {{($active == '') ? 'active': ''}}" href="">HTML5, CSS</a>
        </div>
        <div class="all-course">
            <a class="btn-courses {{($active == '') ? 'active': ''}}" href="">HTML5, CSS, Javascript</a>
        </div>
        <div class="all-course">
            <a class="btn-courses {{($active == '') ? 'active': ''}}" href="">Laravel</a>
        </div>
        <div class="all-course">
            <a class="btn-courses {{($active == '') ? 'active': ''}}" href="">Laravel</a>
        </div>

    </div>

    <div class="container-courses">
        @foreach($data as $row)
        <div class="box-courses">
            <a class="box-coursess" href="{{url('/Course/Detail/'.$row->id)}}">
                <div class="courses-img">
                    <img src="{{asset($row->Image)}}" alt="ບໍ່ມີຮູບພາບ">
                </div>
                <div class="box">
                    <div class="title" title="ຫຼັກສູດ HTML, CSS ແລະ ">{{ __($row->Title)}}</div>
                    <div class="add-by">{{ __($row->Teacher)}}</div>
                    <div class="price">{{ __($row->Group)}}</div>
                    <div class="price">{{ number_format($row->Price)}} ກີບ</div>
                </div>
                <a class="buy" href="{{url('/Course/Detail/'.$row->id)}}">
                    <div class="buy-course">ລົງທະບຽນ</div>
                </a>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection