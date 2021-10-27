@extends('Layouts.Admin')

@section('contents')
<div class="container">
    <div class="card">
        <form action="{{route('ContactStore')}}" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="col-12 mb-5">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Facebook</th>
                                <th scope="col">Messenger</th>
                                <th scope="col">Whatsapp</th>
                                <th scope="col">Line</th>
                                <th scope="col">Github</th>
                                <th scope="col">Eamil</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <th>{{ __($row->id)}}</th>
                                <td>{{ __($row->Facebook)}}</td>
                                <td>{{ __($row->Messenger)}}</td>
                                <td>{{ __($row->Whatsapp)}}</td>
                                <td>{{ __($row->Line)}}</td>
                                <td>{{ __($row->Github)}}</td>
                                <td>{{ __($row->Email)}}</td>
                                 <td>
                                    <a class="btn btn-warning" href="{{ url('/Admin/EditContact/'.$row->id)}}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                 </td>
                            </tr>
                            @endforeach

                        </tbody>
                      </table>

                </div>

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
</div>

@endsection
