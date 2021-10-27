@extends('layouts.Admin')

@section('contents')
<div class="container ">
    <div class="card card-header">
        <div class="title h3 my-4">ເພີ່ມຂໍ້ມູນຫຼັກສູດໃໝ່</div>
        <form action="{{route('StoreCourse')}}" enctype="multipart/form-data" method="post">
            <div class="row border-bottom pb-3" id="Basic">
                <div class="col-12 mb-3">
                    <div class="label" name="title">ຫົວຂໍ້</div>
                    <input name="Title" type="text" value="{{old('Title')}}" class="form-control" required>
                    @error('Title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <div class="label">ຄຳອະທິບາຍໂດຍຫຍໍ້</div>
                    <textarea required name="Sub_Title" cols="20" rows="5" class="form-control">{{old('Sub_Title')}}</textarea>
                    @error('Sub_Title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-8 mb-3">
                    <div class="label">ສອນໂດຍ:</div>
                    <input type="text" name="Teacher" value="{{old('Teacher')}}" class="form-control" required>
                    @error('Teacher')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @csrf
                <div class="col-sm-12 col-md-4 mb-3">
                    <div class="label  ">ເລືອກປະເພດຫຼັກສູດ</div>
                    <select class="form-select" name="Group" required>
                        <option selected disabled value="">ເລືອກ</option>
                        <option {{(old('Group') == 'HTML, CSS') ?  'selected' : ''}} value="HTML, CSS">HTML, CSS</option>
                        <option {{(old('Group') == 'HTML, CSS, Javasript') ?  'selected' : ''}} value="HTML, CSS, Javasript">HTML, CSS, Javasript</option>
                        <option {{(old('Group') == 'PHP ເບື້ອງຕົ້ນ') ?  'selected' : ''}} value="PHP ເບື້ອງຕົ້ນ">PHP ເບື້ອງຕົ້ນ</option>
                        <option {{(old('Group') == 'HTML, CSS, PHP, MySQL') ?  'selected' : ''}} value="HTML, CSS, PHP, MySQL">HTML, CSS, PHP, MySQL</option>
                        <option {{(old('Group') == 'PHP, MySQL">PHP, MySQL') ?  'selected' : ''}} value="PHP, MySQL">PHP, MySQL</option>
                        <option {{(old('Group') == 'Laravel') ?  'selected' : ''}} value="Laravel">Laravel</option>
                        <option {{(old('Group') == 'Laravel, MySQL') ?  'selected' : ''}} value="Laravel, MySQL">Laravel, MySQL</option>
                        <option {{(old('Group') == 'React') ?  'selected' : ''}} value="React">React</option>
                        <option {{(old('Group') == 'React, MySQL') ?  'selected' : ''}} value="React, MySQL">React, MySQL</option>
                        <option {{(old('Group') == 'Flutter') ?  'selected' : ''}} value="Flutter">Flutter</option>
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
                        <input type="number" name="Price" value="{{old('Price')}}" min="0" class="form-control" required>
                        @error('Price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-md-4 mb-3">
                        <div class="label ">ສ່ວນຫຼຸດ</div>
                        <input type="number" name="Promotion" value="{{old('Promotion')}}" min="0" class="form-control">
                        @error('Promotion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-md-4 mb-3">
                        <div class="label ">ສິ້ນສຸດການຈັດໂປຣ</div>
                        <input type="date" name="End_Promotion" value="{{old('End_Promotion')}}" class="form-control">
                        @error('End_Promotion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
            </div>

            <!-- <div class="border-top py-3">
                <div class="row">
                    <div class="col-12 " id="survey_options">
                        <div class="label ">ສິ່ງທີ່ທ່ານຈະໄດ້ຈາກການຮຽນຫຼັກສູດນີ້</div>
                        <input type="text" name="Objective[]" maxlength="255" class="form-control mb-2">
                        <div id="new_input"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div id="add_more_fields" class="btn "><i class="fas fa-plus"></i></div>
                        <div id="remove_fields" class="btn "><i class="fas fa-minus"></i></div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-12 col-md-6 border-top py-3">
                    <div class="label h5">ໂຫຍດທີ່ຈະໄດ້ຈາກຫຼັກສູດນີ້</div>
                    <textarea name="Objective" id="" class="form-control" rows="5" required>{{old('Objective')}}</textarea>
                </div>
                @error('Objective')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="col-12 col-md-6 border-top py-3">
                    <div class="label h5">ສາລະບານ</div>
                    <textarea name="Content" id="" class="form-control" rows="5" required>{{old('Content')}}</textarea>
                </div>
                @error('Content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-12 col-md-6 border-top py-3">
                    <div class="label h5">ສິ່ງທີ່ຈຳເປັນຕ້ອງມີ</div>
                    <textarea name="Need" id="" class="form-control" rows="5" required>{{old('Need')}}</textarea>
                </div>
                @error('Need')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-12 col-md-6  border-top py-3">
                    <div class="label h5">ຫຼັກສູດນີ້ເໝາະສົມກັບໃຜແດ່ ?</div>
                    <textarea name="For_Who" class="form-control" rows="5" required>{{old('For_Who')}}</textarea>
                </div>
                @error('For_Who')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="border-top py-3">
                <div class="label h5">ລາຍລະອຽດ</div>
                <textarea name="Detail" id="" class="form-control" rows="10">{{old('Detail')}}</textarea>
            </div>
            @error('Detail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="col-12 col-md-4 col-lg-3  mb-4">
                <div class="label ">ຮູບພາບ</div>
                <input type="file" name="Image" accept="image/*" class="form-control" onchange="loadFile(event)" required>
                @error('Image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-4 col-lg-3 img-show mb-3">
                <img src="" alt="ບໍ່ມີຮູບພາບ" id="output">
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">ບັນທຶກຂໍ້ມູນ</button>
            </div>
        </form>
    </div>
</div>



<div class="container4">
    <div class="form d-none" nctype="multipart\form-data">
        <div class="card">
            <div class="row p-4 mb-4">
                <div class="col-11 mb-3">
                    <div class="label ">ຫຼັກສູດນີ້ເໝາະສົມກັບໃຜແດ່ ?</div>
                    <textarea name="contents" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div onclick="new_inputBox()" class="btn btn-primary col-3">ບັນທຶກ</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add Input flied for Objective
    var survey_options = document.getElementById('survey_options');
    var add_more_fields = document.getElementById('add_more_fields');
    var remove_fields = document.getElementById('remove_fields');


    add_more_fields.onclick = function() {
        var newField = document.createElement('input');
        newField.setAttribute('type', 'text');
        newField.setAttribute('name', 'Objective[]');
        newField.setAttribute('class', 'form-control mb-2');
        newField.setAttribute('maxlength', '255');
        newField.setAttribute('placeholder', 'ປ້ອນເນື້ອຫາ');
        survey_options.appendChild(newField);
    }

    remove_fields.onclick = function() {
        var input_tags = survey_options.getElementsByTagName('input');
        if (input_tags.length > 1) {
            survey_options.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }


    // Add Input flied for Content
    var survey_options_content = document.getElementById('survey_options_content');
    var add_more_fields_content = document.getElementById('add_more_fields_content');
    var remove_fields_content = document.getElementById('remove_fields_content');


    add_more_fields_content.onclick = function() {
        var newField = document.createElement('input');
        newField.setAttribute('type', 'text');
        newField.setAttribute('name', 'Content[]');
        newField.setAttribute('class', 'form-control mb-2 col-12 col-md-6 col-lg-4');
        newField.setAttribute('maxlength', '255');
        newField.setAttribute('placeholder', 'ປ້ອນສາລະບານ');
        survey_options_content.appendChild(newField);
    }

    remove_fields_content.onclick = function() {
        var input_tags = survey_options_content.getElementsByTagName('input');
        if (input_tags.length > 1) {
            survey_options_content.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }
</script>
@endsection