@extends('Layouts.Admin')

@section('contents')
<div class="container">
    <div class="mt-sm-2 mt-md-5 h3 pb-3 text-center">ລະບົບຈັດການ ຫຼັກສູດ</div>
    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('AddCourse') }}">ເພີ່ມຫຼັກສູດໃໝ່</a>
        <a aria-disabled="off" class="btn btn-primary" href="#">ເພີ່ມລິ້ງ</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center h5" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card card-body">
        <div class="">
            @if(session('delete'))
            <div class="alert alert-danger alert-dismissible fade show text-center h5" role="alert">
                {{session('delete')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table table-striped" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ຫຼັກສູດ</th>
                        <th scope="col">ແກ້ໄຂ</th>
                        <th scope="col">ລົບ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->Title}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/Admin/Courses/Edit/'.$row->id)}}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-delete" del-id="{{$row->id}}" del-img="{{$row->Image}}" del-title="{{$row->Title}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            <form action="{{ route('CourseDelete') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control" id="del-id" required>
                    <input type="hidden" name="unImage" class="form-control" id="del-img" required>
                    <div class="text-center">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            ທ່ານແນ່ໃຈຫຼືບໍວ່າຕ້ອງການລົບຫຼັກສູດ ❗
                            <div class="text-danger" id="title"></div>
                        </h5>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" class="btn btn-primary">ບັນທຶກ</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script>
    $('.btn-delete').click(function() {
        $('#modal-delete').modal('show');

        // get value
        let id = $(this).attr('del-id');
        let image = $(this).attr('del-img');
        let title = $(this).attr('del-title');

        // set value
        $('#del-id').val(id);
        $('#del-img').val(image);
        $('#title').append(title);

    });
</script>
@endsection