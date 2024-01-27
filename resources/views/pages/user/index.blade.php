@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                   All User
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="user_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $user)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->user_type }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa-solid fa-trash"></i></i></a>
                                <form action="{{ route('users.delete', $user->id) }}" method="post" class="d-none" id="delete-form">
                                    @csrf

                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let table = new DataTable('#user_table');
    </script>
@endpush
