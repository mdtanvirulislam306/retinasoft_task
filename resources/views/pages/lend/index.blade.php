@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    All Lend
                </div>
                <div class="card-body">
                    <form action="{{ route('lend.index') }}" method="get" class="d-flex col-6">
                        <input type="date" class="form-control m-2" name="start_date" required>
                        <input type="date" class="form-control m-2" name="end_date" required>
                        <input type="submit" class="btn btn-primary m-2" value="filter">
                    </form>
                    <table class="table table-bordered" id="lend_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Debtor</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $lend)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $lend->title?$lend->title:'' }}</td>
                                <td>{{ $lend->amount?$lend->amount:'' }}</td>
                                <td>{{ $lend->debtors->name?$lend->debtors->name:'' }}</td>
                                <td>{{ $lend->issue_date?$lend->issue_date:'' }}</td>
                                <td>{{ $lend->due_date?$lend->due_date:'' }}</td>
                                <td>
                                    @if($lend->status=='Return')
                                        <p class="text-primary">{{$lend->status}}</p>
                                    @elseif($lend->status=='Due')
                                        <p class="text-danger">{{$lend->status}}</p>
                                    @endif

                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('lend.edit', $lend->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                    <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa-solid fa-trash"></i></i></a>
                                    <form action="{{ route('lend.delete', $lend->id) }}" method="post" class="d-none" id="delete-form">
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
        let table = new DataTable('#lend_table');
    </script>
@endpush
