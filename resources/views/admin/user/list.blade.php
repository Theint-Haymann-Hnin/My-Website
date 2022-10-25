@extends('admin.dashboard')
@section('content')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" style="background-color:RGB(255, 255, 255) ;">
                    @if (Session('successAlert'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <strong>{{ Session('successAlert') }}</strong>
                            <button class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role == 0 ? 'User' : 'Admin' }}</td>
                                <td>
                                    <form action="{{ url('/user/delete/' . $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('/user/edit/' . $user->id) }}"><button type="button"
                                                class="btn btn-outline-success btn-sm " style="border-radius:5px;"><i
                                                    class="fa fa-edit"></i> Edit</button></a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                            style="border-radius:5px;"><i class="fa fa-trash"></i> Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
