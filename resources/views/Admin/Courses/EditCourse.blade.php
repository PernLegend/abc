@extends('layouts.Admin')

@section('contents')
<div class="container ">
    <div class="card card-header mt-5">
        <div class="title h3 my-4">ແກ້ໄຂຂໍ້ມູນຫຼັກສູດ</div>
        <form action="{{route('UpdateData')}}" enctype="multipart/form-data" method="post">
            <div class="row border-bottom pb-3" id="Basic">
                <div class="col-12 mb-3">
                    <div class="label" name="title">ຫົວຂໍ້</div>
                    <input name="Title" type="text" value="{{old('Title') ?? $data->Title}}" class="form-control" required>
                    @error('Title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <div class="label">ຄຳອະທິບາຍໂດຍຫຍໍ້</div>
                    <textarea required name="Sub_Title" cols="20" rows="5" class="form-control">{{old('Sub_Title') ?? $data->Sub_Title}}</textarea>
                    @error('Sub_Title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-8 mb-3">
                    <div class="label">ສອນໂດຍ:</div>
                    <input type="text" name="Teacher" value="{{old('Teacher') ?? $data->Teacher}}" class="form-control" required>
                    @error('Teacher')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @csrf
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="label  ">ເລືອກປະເພດຫຼັກສູດ</div>
                    <select class="form-select" name="Group" required>
                        <option selected disabled value="">ເລືອກ</option>
                        <option {{ ($data->Group == 'HTML, CSS') ?  'selected' : ''}} value="HTML, CSS">HTML, CSS</option>
                        <option {{ ($data->Group == 'HTML, CSS, Javasript') ?  'selected' : ''}} value="HTML, CSS, Javasript">HTML, CSS, Javasript</option>
                        <option {{ ($data->Group == 'PHP ເບື້ອງຕົ້ນ') ?  'selected' : ''}} value="PHP ເບື້ອງຕົ້ນ">PHP ເບື້ອງຕົ້ນ</option>
                        <option {{ ($data->Group == 'HTML, CSS, PHP, MySQL') ?  'selected' : ''}} value="HTML, CSS, PHP, MySQL">HTML, CSS, PHP, MySQL</option>
                        <option {{ ($data->Group == 'PHP, MySQL">PHP, MySQL') ?  'selected' : ''}} value="PHP, MySQL">PHP, MySQL</option>
                        <option {{ ($data->Group == 'Laravel') ?  'selected' : ''}} value="Laravel">Laravel</option>
                        <option {{ ($data->Group == 'Laravel, MySQL') ?  'selected' : ''}} value="Laravel, MySQL">Laravel, MySQL</option>
                        <option {{ ($data->Group == 'React') ?  'selected' : ''}} value="React">React</option>
                        <option {{ ($data->Group == 'React, MySQL') ?  'selected' : ''}} value="React, MySQL">React, MySQL</option>
                        <option {{ ($data->Group == 'Flutter') ?  'selected' : ''}} value="Flutter">Flutter</option>
                    </select>
                    @error('Group')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="border-top  py-3">
                <div class="row">
                    <div class="col-sm-12 col-md-4 mb-3">
                        <div class="label ">ລາຄາ</div>
                        <input type="number" name="Price" value="{{old('Price') ?? $data->Price}}" min="0" class="form-control" required>
                        @error('Price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-md-4 mb-3">
                        <div class="label ">ສ່ວນຫຼຸດ</div>
                        <input type="number" name="Promotion" value="{{old('Promotion') ?? $data-> Promotion}}" min="0" class="form-control">
                        @error('Promotion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-md-4 mb-3">
                        <div class="label ">ສິ້ນສຸດການຈັດໂປຣ</div>
                        <input type="date" name="End_Promotion" value="{{old('End_Promotion') ?? $data->End_Promotion}}" class="form-control">
                        @error('End_Promotion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-md-6 border-top py-3">
                    <div class="label h5">ໂຫຍດທີ່ຈະໄດ້ຈາກຫຼັກສູດນີ້</div>
                    <textarea name="Objective" id="" class="form-control" rows="5" required>{{old('Objective') ?? $data->Objective}}</textarea>
                </div>
                @error('Objective')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="col-12 col-md-6 border-top py-3">
                    <div class="label h5">ສາລະບານ</div>
                    <textarea name="Content" id="" class="form-control" rows="5" required>{{old('Content') ?? $data->Content}}</textarea>
                </div>
                @error('Content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-12 col-md-6 border-top py-3">
                    <div class="label h5">ສິ່ງທີ່ຈຳເປັນຕ້ອງມີ</div>
                    <textarea name="Need" id="" class="form-control" rows="5" required>{{old('Need') ?? $data->Need}}</textarea>
                </div>
                @error('Need')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-12 col-md-6  border-top py-3">
                    <div class="label h5">ຫຼັກສູດນີ້ເໝາະສົມກັບໃຜແດ່ ?</div>
                    <textarea name="For_Who" class="form-control" rows="5" required>{{old('For_Who') ?? $data->For_Who}}</textarea>
                </div>
                @error('For_Who')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="border-top py-3">
                <div class="label h5">ລາຍລະອຽດ</div>
                <textarea name="Detail" id="" class="form-control" rows="10">{{old('Detail') ?? $data->Detail}}</textarea>
            </div>
            @error('Detail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <input type="hidden" name="id" value="{{ $data->id }}">

            <div class="mb-3 col-12">
                <a class="btn btn-secondary" href="{{ route('AdminCourses') }}">ຍົກເລີກ</a>
                <button class="btn btn-primary" type="submit">ອັບເດດຂໍ້ມູນ</button>

            </div>
        </form>
    </div>

    <div class="card card-header my-5">
        <form action="{{route('UpdateImage')}}" enctype="multipart/form-data" method="post">
            <div class="col-12 col-md-4 col-lg-3  mb-4">
                <div class="label ">ຮູບພາບ</div>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="oldImage" value="{{ __($data->Image)}}">
                <input type="file" name="Image" accept="image/*" class="form-control" onchange="loadFile(event)">
                @error('Image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @csrf
            <div class="col-12 col-md-4 col-lg-3 img-show mb-3">
                <img src="{{asset($data->Image)}}" alt="ບໍ່ມີຮູບພາບ" id="output">
            </div>

            <div class="mb-3 col-12">
                <a class="btn btn-secondary" href="{{ route('AdminCourses') }}">ຍົກເລີກ</a>
                <button class="btn btn-primary" type="submit">ອັບເດດຮູບພາບ</button>
            </div>
        </form>
    </div>
</div>


@endsection