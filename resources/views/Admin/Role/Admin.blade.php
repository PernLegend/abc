@extends('Layouts.Admin')

@section('contents')
<div class="container">
    <div class="mt-sm-2 mt-md-5 h3 pb-3 text-center">ລະບົບຈັດການ ຜູ້ໃຊ້ງານ Admin</div>

    <div class="my-3">
        <a class="btn btn-primary" href="{{ route('RoleAdmin')}}">Admins</a>
        <a class="btn btn-outline-primary" href="{{ route('RoleMember')}}">Members</a>
    </div>
    <div class="card card-header" id="box_admin">
        @if(session('UpdateAdmin'))
        <div class="alert alert-warning alert-dismissible fade show text-center h5" role="alert">
            {{session('UpdateAdmin')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table table-striped" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ຜູ້ໃຊ້ງານ</th>
                    <th scope="col">ອີເມວ</th>
                    <th scope="col">ລົງທະບຽນ</th>
                    <th scope="col">ແກ້ໄຂ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Users as $row)
                <tr>
                    <td>{{ __($row->id)}}</td>
                    <td>{{ __($row->name)}} </td>
                    <td>{{ __($row->email)}} </td>
                    <td>{{ __($row->created_at)}} </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-id="{{$row->id}}" data-name="{{$row->isAdmin}}">
                            <i class="far fa-edit"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- Vertically centered modal -->
<!-- Modal -->
<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="staticBackdropLabel">ປ່ຽນແປງສິດການໃຊ້ງານ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('RoleUpdate') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <input type="hidden" name="id" class="form-control" id="id" required>
                            <input type="text" disabled class="form-control" id="isAdmin">
                        </div>

                        <div class="col-12 col-md-9">
                            <select name="isAdmin" class="form-control" required>
                                <option selected disabled value="">-- ເລືອກ --</option>
                                <option value="Admin">Admin</option>
                                <option value="Member">Member</option>
                            </select>
                        </div>
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
    $('.btn-warning').click(function() {
        $('#modal').modal('show');

        // get value
        let id = $(this).attr('data-id');
        let isAdmin = $(this).attr('data-name');

        // set value
        $('#id').val(id);
        $('#isAdmin').val(isAdmin);

    });
</script>
@endsection
