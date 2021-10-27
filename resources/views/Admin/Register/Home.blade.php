@extends('Layouts.Admin')

@section('contents')
<div class="container">
    <div class="card card-header my-5">
        <div class="row ">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <img id="output" src="{{ asset('Images/Profile/Avata.jps') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-12 mb-3">
                            <div class="card">
                                <input onchange="loadFile(event)" type="file" class="form-control" name="Image" value="{{ old('Image')}}">
                            </div>
                            <div class="form-text">ອັບໂຫຼດຮູບພາບ</div>
                            @error('Image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @csrf
                        <div class="col-12">
                            <button id="" class="btn btn-primary mt-2" type="submit">ບັນທຶກ</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9 enroll">
                <div class="float-end btn btn-warning"><i class="fas fa-user-edit"></i></div>
                <div class="row pt-3">
                    <div class="col-12 h2 mb-3">
                        ຂໍ້ມູນການລົງທະບຽນ
                    </div>
                    <div class="col-12 h5">
                        <span class="fw-7"> ຊື່ ແລະ ນາມສະກຸນ:</span> ກດເກເເດກເກດ ກເກດເດກເຫດ
                    </div>

                    <div class="col-12 h5">
                        <span class="fw-7"> ທີ່ຢູ່:</span> ກດເກເເດກເກດ ກເກດເດກເຫດ ກເກດເດກເຫດ
                    </div>
                    <div class="py-3 card card-header mt-3">
                        <div class="col-12 h5 pb-1">
                            <span class="fw-7"> <i class="fas fa-mobile-alt tel"></i> :</span> <a target="_blank" href="tel:856">20000000</a>
                        </div>

                        <div class="col-12 h5 pb-1">
                            <span class="fw-7"><i class="fab fa-whatsapp whatsapp"></i> :</span> <a target="_blank" href=" https://wa.me/8562091116465?text=ສະບາຍດີ">ewewewe </a>
                        </div>

                        <div class="col-12 h5 pb-1">
                            <span class="fw-7"><i class="fab fa-weixin wechat"></i> :</span> <a target="_blank" href="">wqweqweq </a>
                        </div>

                        <div class="col-12 h5 pb-1">
                            <span class="fw-7"><i class="fab fa-facebook facebook"></i> :</span> <a target="_blank" href="">dasdasdasdas</a>
                        </div>

                    </div>
                    <div class="course h3 mt-4">
                        ຫຼັກສູດທີ່ທ່ານເລືອກ
                    </div>
                    <div class="">fsfsdf sfsກຫດຫາດຫດນຫກດ ຫດຮ ຫດຫກດຫດກາຫກນດຫ ດ ດຫກ ດຫກດ</div>
                    <div class=""> <span class="fw-7"> <i class="far fa-calendar-alt"></i> ເວລາຮຽນ : </span> ວັນອາທິດ 14:00 - 16:00</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection