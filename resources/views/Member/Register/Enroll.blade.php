@extends('Layouts.Member')

@section('contents')


<div class="container enroll">
    <form action="{{route('EnrollStore')}}" method="post">
        <div class="card card-header p-4 my-5">
            <div class="h3 py-3 text-danger">ລົງທະບຽນສະໝັກຮຽນ</div>
            <div id="form">
                <div class="h5 text-primary border-bottom py-2">ຂໍ້ມູນຜູ້ສະໝັກ</div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="row text-end">
                            <div class="col-12">
                                <label for="">ຊື່ ແລະ ນາມສະກຸນ : </label>
                            </div>

                            <div class="col-12">
                                <label for="">ເບີໂທ : </label>
                            </div>

                            <div class="col-12">
                                <label for="">Whatsapp : </label>
                            </div>

                            <div class="col-12">
                                <label for="">ທີ່ຢູ່ : </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row">
                            <div class="col-12">
                                <label
                                    class="px-2 text-secondary">{{ Auth::user()->FirstName .' ' .Auth::user()->LastName}}
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="px-2 text-secondary">{{ Auth::user()->Tel}} </label>
                            </div>
                            <div class="col-12">
                                <label class="px-2 text-secondary">{{ Auth::user()->Whatsapp}} </label>
                            </div>
                            <div class="col-12">
                                <label
                                    class="px-2 text-secondary">{{ Auth::user()->Village. ', ' .Auth::user()->District. ', '.Auth::user()->Province}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" mt-4 pt-4">
                    <div class="h5 pt2 pb-3 text-primary boder border-bottom">ຂໍ້ມູນຫຼັກສູດທີ່ທ່ານເລືອກ</div>
                    <div class="row">

                        <div class="col-12 mb-3">
                            <div class="label ">Courses ທີ່ເລືອກ</div>
                            <input type="hidden" name="Serial_Course" value="{{ __($data->Serial) }}">
                            <textarea disabled id="" cols="30" rows="4"
                                class="form-control">{{ __($data->Title) }}</textarea>
                        </div>

                        <div class="col-12 col-md-4"></div>

                        <div class="col-12 col-md-4 mb-3">
                            <div class="label ">ສ່ວນຫຼຸດ</div>
                            <input class="form-control" disabled type="" name="Serial_Course"
                                value="{{ ($data->Promotion == 'null') ? 'ບໍ່ມີ' : $data->Promotion }}">
                            <input type="hidden" class="form-control" value="{{ __($data->Promotion) }}"
                                name="Promotion">
                        </div>

                        <div class="col-sm-12 col-md-4 mb-3">
                            <div class="label  ">ລາຄາ</div>
                            <input disabled value="{{ number_format( $data->Price) }} &nbsp; ກີບ" class="form-control">
                            <input type="hidden" class="form-control" value="{{ __( $data->Price) }}" name="Price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-3">
                    <div id="btn_next" class="btn btn-primary">ໄປໜ້າ &nbsp; <i class="fas fa-chevron-circle-right"></i>
                    </div>
                    <div id="btn_prev" class="btn btn-primary d-none"><i class="fas fa-chevron-circle-left"></i> &nbsp;
                        ຍ້ອນກັບ</div>
                </div>
            </div>


            <div id="payment" class="d-none">
                <div class="border-bottom py-2 text-primary h5">ການຊຳລະເງິນ</div>
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-12 col-md-3 text-end fw-800">BCEL : </div>
                        <div class="col-12 col-md-9">
                            <div class="input-group">
                                <input disabled type="text" name="" id="copy-bcel" value="BCEL" class="form-control">
                                <div id="bcel" class="btn btn-primary">Copy</div>
                            </div>
                            <div id="text-bcel" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 col-md-3 text-end fw-800">JDB : </div>
                        <div class="col-12 col-md-9">
                            <div class="input-group">
                                <input disabled type="text" value="JDB" id="copy-jdb" class="form-control">
                                <div id="JDB" class="btn btn-primary">Copy</div>
                            </div>
                            <div id="text-jdb" class=" text-danger"></div>
                        </div>
                    </div>

                    <div class=" row mb-3">
                        <div class="col-12 col-md-3 text-end fw-800">LaoVietBank : </div>
                        <div class="col-12 col-md-9">
                            <div class="input-group">
                                <input disabled type="text" id="copy-lv" value="LaoVietBank" class="form-control">
                                <div id="LaoVietBank" class="btn btn-primary">Copy</div>
                            </div>
                            <div id="text-lv" class="text-danger"></div>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-sm-12  mb-3">
                            <div class="label">ເລືອກເວລາຮຽນ</div>
                            <select class="form-select" name="Time_Table" required>
                                <option selected disabled value="">ເລືອກ</option>
                                <option value="ຈັນຫາສຸກ 18:00 - 20:00">ຈັນຫາສຸກ 18:00 - 20:00</option>
                                <option value="ຈັນຫາສຸກ 20:00 - 22:00">ຈັນຫາສຸກ 20:00 - 22:00</option>
                                <option value="ເສົາ-ທິດ 08:00 - 12:00">ເສົາ-ທິດ 08:00 - 12:00</option>
                                <option value="ເສົາ-ທິດ 13:00 - 16:00">ເສົາ-ທິດ 13:00 - 16:00</option>
                            </select>
                            <label for=""><span class="text-danger">ເລືອກເວລາ</span> ທີ່ທ່ານຕ້ອງການຮຽນ</label>
                            @error('TimeTable')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-12  mb-3 ">
                            <label for="">ຮູບໃບບິນ</label>
                            <input class="form-control" type="file" name="Bill" onchange="loadFile(event)"
                                accept="image/*" required>
                            <div class="form-text"><span class="text-danger px-2">ອັບໂຫຼດ</span>ຮູບໃບບິນ ການຊຳລະເງິນ
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3">
                            <img src="" class="img-fluid" id="output">
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <button class="btn btn-success" type="submit">ຢືນຢັນ ຄຳສັ່ງຊື້
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


<script>
let bcel = document.querySelector('#bcel');
let jdb = document.querySelector('#JDB');
let LaoVietBank = document.querySelector('#LaoVietBank');

let text_bcel = document.querySelector('#text-bcel');
let text_jdb = document.querySelector('#text-jdb');
let text_lv = document.querySelector('#text-lv');

let copy_bcel = document.querySelector('#copy-bcel');
let copy_jdb = document.querySelector('#copy-jdb');
let copy_lv = document.querySelector('#copy-lv');

let btn_next = document.querySelector('#btn_next');
let pay = document.querySelector('#payment');
let form = document.querySelector('#form');
let btn_prev = document.querySelector('#btn_prev');

btn_next.onclick = function() {
    pay.classList.remove('d-none')
    form.classList.add('d-none')
    btn_next.classList.add('d-none')
    btn_prev.classList.remove('d-none')
}

btn_prev.onclick = function() {
    pay.classList.add('d-none')
    form.classList.remove('d-none')
    btn_next.classList.remove('d-none')
    btn_prev.classList.add('d-none')
}

bcel.onclick = function() {
    text_bcel.innerHTML = 'Copy';
    copy_bcel.select();
    copy_bcel.setSelectionRange(0, 99999); /* For mobile devices */
    navigator.clipboard.writeText(copy_bcel.value);
}

jdb.onclick = function() {
    text_jdb.innerHTML = 'Copy';
    copy_jdb.select();
    copy_jdb.setSelectionRange(0, 99999); /* For mobile devices */
    navigator.clipboard.writeText(copy_jdb.value);
}

LaoVietBank.onclick = function() {
    text_lv.innerHTML = 'Copy';
    copy_lv.select();
    copy_lv.setSelectionRange(0, 99999); /* For mobile devices */
    navigator.clipboard.writeText(copy_lv.value);
}
</script>
@endsection
