@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    All Expense
                </div>
                <div class="card-body">
                    <form action="{{ route('expense.index') }}" method="get" class="d-flex col-6">
                        <input type="date" class="form-control m-2" name="start_date" required>
                        <input type="date" class="form-control m-2" name="end_date" required>
                        <input type="submit" class="btn btn-primary m-2" value="filter">
                    </form>
                    <table class="table table-bordered" id="expense_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Supplier</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $expense)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $expense->title?$expense->title:'' }}</td>
                                <td>{{ $expense->amount?$expense->amount:'' }}</td>
                                <td>{{ $expense->suppliers->name?$expense->suppliers->name:'' }}</td>
                                <td>{{ $expense->date?$expense->date:'' }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('expense.edit', $expense->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                    <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa-solid fa-trash"></i></i></a>
                                    <form action="{{ route('expense.delete', $expense->id) }}" method="post" class="d-none" id="delete-form">
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
        let table = new DataTable('#expense_table');
    </script>
@endpush
