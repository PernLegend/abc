@extends('Layouts.User')

@section('contents')
<div id="detail-course">
    <div class="container">
        <div class="detail-course">
            <div class="detail-header">
                <div class="detail-left">
                    <div class="title h3 fw-800">{{ __($data->Title) }}</div>
                    <div class="sub-title"> {{!! nl2br($data->Sub_Title) !!}}</div>
                    <div class="add-by pb-1">{{ __($data->Teacher) }}</div>
                    <div class="group pb-1">Group: {{ __($data->Group) }}</div>
                    <div class="update ">ປັງປຸງຄັ້ງລ້າສຸດ: {{ __($data->Update) }}</div>
                </div>
                <div class="detail-right ">
                    <div class="detail-img">
                        <img src="{{asset($data->Image)}}" alt="">
                    </div>
                    <div class="detail-text ">
                        <div class="price">
                            <div class="price-one pb-3">
                                <p class="price pe-2">K {{ __($data->Price) }}</p>
                                <div class="promotion-group">
                                    <p class="promotion px-md-0 px-2 "> {{ __($data->Promotion) }}</p>
                                    <p class="promotion-text px-2  h6">ຫຼຸດ</p>
                                    <p class="percentage  h6">70%</p>
                                </div>
                            </div>
                            <div class="price-two px-1">
                                <div class="end-date"><i class="fas fa-stopwatch"></i> {{ __($data->End_Promotoin) }}</div>
                                <div class="code">Code: {{ __($data->Serial) }}</div>
                            </div>
                        </div>
                        <div class="btn-register"><a href="{{ url('/Member/Enroll/'.$data->id) }}">ssssssssssssssss</a></div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="card card-body mt-5">
        <div class="title mb-3">ສິ່ງທີ່ທ່ານຈະໄດ້ຈາກການຮຽນຫຼັກສູດນີ້</div>
        <p>{{!! nl2br($data->Objective) !!}}</p>

        <!-- <div class="purpose">
            <div class="What-learn-all">
                <div class="icon"><i class="fas fa-angle-double-right"></i></div>
                <div class="">ສ້າງແອັບຯເວັບທີ່ມີປະສິດທິພາບ, ໄວ, ເປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້
                    ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາ</div>
            </div>
            <div class="What-learn-all">
                <div class="icon"><i class="fas fa-angle-double-right"></i></div>
                <div class="">ສ້າງແອັບຯເວັບທີ່ມີປະສິດທິພາບ, ໄວ, ເປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້
                    ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາ</div>
            </div>
            <div class="What-learn-all">
                <div class="icon"><i class="fas fa-angle-double-right"></i></div>
                <div class="">ສ້າງແອັບຯເວັບທີ່ມີປະສິດທິພາບ, ໄວ, ເປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້
                    ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາ</div>
            </div>
            <div class="What-learn-all">
                <div class="icon"><i class="fas fa-angle-double-right"></i></div>
                <div class="">ສ້າງແອັບຯເວັບທີ່ມີປະສິດທິພາບ, ໄວ, ເປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້
                    ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາປັນມິດກັບຜູ້ໃຊ້ ແລະປະຕິກິລິຍາ</div>
            </div>
        </div> -->
    </div>
    <div class="box-content space-pb-2 space-pt-2">
        <div class="Course-content  space-pb-2">
            <div class="title mb-2"><i class="fas fa-book"></i> ສາລະບານ </div>
            <div class="content-list">
                <p>{{!! nl2br($data->Content) !!}}</p>
            </div>
        </div>
        <div class="">
            <div class="Requirements space-pb-2">
                <div class="title mb-2"><i class="fas fa-book"></i> ສິ່ງທີ່ຈຳເປັນຕ້ອງມີ</div>
                <p>{{!! nl2br($data->Need) !!}}</p>
            </div>
            <div class="course-for ">
                <div class="title mb-2"><i class="fas fa-book"></i> ຫຼັກສູດນີ້ເໝາະສົມກັບໃຜແດ່ ?</div>
                <p>{{!! nl2br($data->For_Who) !!}}</p>
            </div>
        </div>
    </div>

    <div class="title mb-3">ລາຍລະອຽດຂອງຫຼັກສູດ</div>
    <div class="Description space-pb-2 card card-body">
        <p>{{!! nl2br($data->Detail) !!}}</p>
    </div>
</div>
@endsection