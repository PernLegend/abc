@extends('Layouts.Admin')

@section('contents')
<div class="container">
    <div class="mt-sm-2 mt-md-5 h3 pb-3 text-center">ລະບົບຈັດການ ໝວດໝູ່ຫຼັກສູດ</div>

    <div class="row">
        <div class="col-md-12 col-lg-8 card p-3">
            @if(session('update'))
            <div class="alert alert-warning alert-dismissible fade show text-center h5" role="alert">
                {{session('update')}} {{header("Refresh:3")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table table-striped" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ຊື່ໝວດໝູ່</th>
                        <th scope="col">ແກ້ໄຂ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->NameLinks}} </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-id="{{$row->id}}" data-name="{{$row->NameLinks}}">
                                ແກ້ໄຂ
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-lg-4 ">
            <div class="card p-3">
                <form action="{{route('LinkStore')}}" method="post">
                    <div class="h4 text-center pb-2 ">ເພີ່ມໝວດໝູ່ຫຼັກສູດ</div>
                    @if(session('success'))
                    <div class="alert alert-success text-center h5">
                        {{session('success')}}
                    </div>
                    @endif

                    <div class="row">
                        @csrf
                        <div class="col-sm-12 mb-3">
                            <input type="text" name="NameLinks" value="{{ old('NameLinks') }} " class="form-control" placeholder="ປ້ອນໝວດຫໝູ່">
                        </div>
                        @error('NameLinks')
                        <div class="alert alert-warning text-center h5">
                            {{$message}}
                        </div>
                        @enderror

                        <div class="col-sm-12 ">
                            <button class="btn btn-primary" type="submit">ບັນທຶກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Vertically centered modal -->
<!-- Modal -->
<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">ອັບເດດຊື່ໝວດໝູ່</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('LinkUpdate') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-control" id="id" required>
                    <input type="text" name="NameLinks" class="form-control" id="NameLink" required>
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
    $('.btn-warning').click(function() {
        $('#modal').modal('show');

        // get value
        let id = $(this).attr('data-id');
        let NameLink = $(this).attr('data-name');

        // set value
        $('#id').val(id);
        $('#NameLink').val(NameLink);

    });
</script>
@endsection