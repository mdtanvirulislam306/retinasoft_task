@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    All Incomes
                </div>
                <div class="card-body">
                    <form action="{{ route('income.index') }}" method="get" class="d-flex col-6">
                        <input type="date" class="form-control m-2" name="start_date" required>
                        <input type="date" class="form-control m-2" name="end_date" required>
                        <input type="submit" class="btn btn-primary m-2" value="filter">
                    </form>
                    <table class="table table-bordered" id="income_table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $income)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $income->title?$income->title:'' }}</td>
                                <td>{{ $income->amount?$income->amount:'' }}</td>
                                <td>{{ $income->customers?$income->customers->name:'' }}</td>
                                <td>{{ $income->date?$income->date:'' }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('income.edit', $income->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                    <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa-solid fa-trash"></i></i></a>
                                    <form action="{{ route('income.delete', $income->id) }}" method="post" class="d-none" id="delete-form">
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
        let table = new DataTable('#income_table');
    </script>
@endpush
