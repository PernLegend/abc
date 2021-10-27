@extends('Layouts.User')

@section('contents')
<div class="main">
    <div class="autoplay">
        @foreach($Slider as $Slide)
        <img src="{{asset($Slide->Images)}}" alt="ບໍ່ມີຮູບພາບ" />
        @endforeach
    </div>
</div>

<div class="container">
    <div class="course-popular">ຫຼັກສູດ <span>ຍອດນິຍົມ</span></div>
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

<div class="container ">
    <div class="portfolio">
        <div class="my-photo">
            <img src="{{asset('images/bg/my-picture.jpg')}}" alt="">
        </div>
        <div class="about-me">
            <div class="weAreGoing">ພວກເຮົາຈະກ້າວໄປດ້ວຍກັນ</div>
            <div class="pb-2">
                " ຈົ່ງຢ່າພຽງແຕ່ຄິດ ແຕ່ຈົ່ງຄິດໃຫ້ສ້າງສັນ ພ້ອມລົງມືກະທຳ "
            </div>
            <div class="pb-2">
                " ຈົ່ງຮຽນຮູ້ຈາກຄວາມຜິດພາດ ເພື່ອກ້າວສູ່ຄວາມສຳເລັດ " <br>
            </div>
            <div class="pb-2">
                " ໜຶ່ງຄວາມພະຍາຍາມ ອາດບໍ່ນຳມາເຊິງຄວາມສຳເລັດ <br>
                ແຕ່ທຸກຄວາມສຳເລັດ ຍ່ອມໄດ້ມາຈາກ ໜຶ່ງໃນລ້ານຂອງຄວາມພະຍາຍາມ "
            </div>
        </div>
    </div>
</div>

@endsection