@extends('Layouts.Admin')

@section('contents')

{{-- <div class="container1">
    <div class="card">
        <form action="{{route('UpdateData')}}" enctype="multipart/form-data" method="post">
            <div class="row">
                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="">Facebook</label>
                            <input type="text" class="form-control" name="Facebook" placeholder="Page Facebook: Champadev" value="{{old('Facebook')}}">
                            @error('Facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="">Messenger</label>
                            <input type="text" class="form-control" name="Messenger" placeholder="Facebook Messenger: Champadev" value="{{old('Messenger')}}">
                            @error('Messenger')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="">Whatsapp</label>
                            <input type="number" min="20" placeholder="Tel: 20XXXXXXXX" class="form-control" name="Whatsapp" value="{{old('Whatsapp')}}">
                            @error('Whatsapp')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="">Line</label>
                            <input type="text" class="form-control" name="Line" placeholder="Line ID: Champadev or 20xxxxxxxx" value="{{old('Line')}}">
                            @error('Line')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="">Github</label>
                            <input type="text" class="form-control" name="Github" placeholder="User ID: Champadev" value="{{old('Github')}}">
                            @error('Github')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="">Email</label>
                            <input type="Email" class="form-control" name="Email" placeholder="Champadev@gmail.com" value="{{old('Email')}}">
                            @error('Email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary me-2">ບັນທຶກ</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</div> --}}

<div class="box_contact">
    <div class="title">
        Edit
    </div>
    <div class="input_group">
        <input type="text" class="form_input " placeholder="Name" >
        <input type="text" class="form_input " placeholder="Name" >
        <input type="text" class="form_input " placeholder="Name" >
        <input type="text" class="form_input " placeholder="Name" >
        <input type="text" class="form_input " placeholder="Name" >
        <input type="text" class="form_input " placeholder="Name" >
        <input type="text" class="form_input " placeholder="Name" >
    </div>
    <div class="button">
        <button type="submit" class="button_submit"> Save</button>
    </div>

</div>

@endsection
