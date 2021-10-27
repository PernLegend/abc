@extends('Layouts.Admin')

@section('contents')
<div class="container">
    <div class="mt-sm-2 mt-md-5 h3 pb-3 text-center">ລະບົບຈັດການ ຮູບພາບ Slide Show</div>

    <div class="row">
        <div class="col-md-12 col-lg-8 card p-3">
            @if(session('delete'))
            <div class="alert alert-warning alert-dismissible fade show text-center h5" role="alert">
                {{session('delete')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show text-center h5" role="alert">
                {{session('update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            @error('imageNew')
            <div class="alert alert-warning alert-dismissible fade show text-center h5" role="alert">
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror


            <table class="table table table-striped" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ຮູບພາບ</th>
                        <th scope="col">ວ.ດ.ປ ອັບເດດ</th>
                        <th scope="col">ແກ້ໄຂ</th>
                        <th scope="col">ລົບ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td><img src="{{asset($row->Images)}}" alt="ບໍ່ມີຮູບພາບ" class="img-thumbnail"></td>
                        <td>{{($row->updated_at == '') ? $row->created_at : $row->updated_at}}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-id="{{$row->id}}" data-name="{{$row->Images}}">
                                <i class="far fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-delete" del-id="{{$row->id}}" del-img="{{$row->Images}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-lg-4 ">
            <div class="card p-3">
                <form action="{{route('SliderStore')}}" enctype="multipart/form-data" method="post">
                    <div class="h4 text-center pb-2 ">ເພີ່ມຮູບພາບ Slide Show</div>
                    @if(session('success'))
                    <div class="alert alert-success text-center h5">
                        {{session('success')}}
                    </div>
                    @endif

                    <div class="row">
                        @csrf
                        <div class="col-sm-12 mb-3">
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>
                        @error('image')
                        <div class="alert alert-warning text-center h5">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="col-sm-12 ">
                            <button class="btn btn-primary" type="submit">ອັບໂຫຼດຮູບພາບ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal edit -->
<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">ອັບເດດຊື່ໝວດໝູ່</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SliderUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control" id="id" required>
                    <input type="hidden" name="Unlink" class="form-control" id="NameLink" required>
                    <input type="file" name="imageNew" accept="image/*" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" class="btn btn-primary">ອັບເດດ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal delete -->
<div class="modal fade" id="modal-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SliderDelete') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control" id="del-id" required>
                    <input type="hidden" name="unImage" class="form-control" id="del-img" required>
                    <div class="text-center">
                        <h5 class="modal-title" id="staticBackdropLabel">ທ່ານແນ່ໃຈຫຼືບໍວ່າຕ້ອງການລົບ❗</h5>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" class="btn btn-danger">ຍືນຍັນ</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script>
    $('.btn-warning').click(function() {
        $('#modal').modal('show');

        // get value
        let id = $(this).attr('data-id');
        let NameLink = $(this).attr('data-name');

        // set value
        $('#id').val(id);
        $('#NameLink').val(NameLink);

    });

    $('.btn-delete').click(function() {
        $('#modal-delete').modal('show');

        // get value
        let id = $(this).attr('del-id');
        let image = $(this).attr('del-img');

        // set value
        $('#del-id').val(id);
        $('#del-img').val(image);

    });
</script>
@endsection