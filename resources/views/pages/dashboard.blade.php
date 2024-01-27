@extends('dashboard')
@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <form action="{{ route('dashboard') }}" method="get" class="d-flex col-6">
                <input type="date" class="form-control m-2" name="start_date" required>
                <input type="date" class="form-control m-2" name="end_date" required>
                <input type="submit" class="btn btn-primary m-2" value="filter">
            </form>
            <div class="row">
                <div class="col-3">
                    <div class="card mb-4 text-white bg-primary">
                        <div class="card-body pb-2">
                            <div>
                                <div class="fs-4 fw-semibold">{{ $lp }}</div>
                                @if($lp>=0)
                                    <div>Profit</div>
                                @else
                                    <div>Loss</div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card mb-4 text-white bg-info">
                        <div class="card-body pb-2 ">
                            <div>
                                <div class="fs-4 fw-semibold">{{ $income }} </div>
                                <div>Total Income</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3">
                    <div class="card mb-4 text-white bg-warning">
                        <div class="card-body pb-2">
                            <div>
                                <div class="fs-4 fw-semibold">{{ $expense }} </div>
                                <div>Total Expense</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card mb-4 text-white bg-danger">
                        <div class="card-body pb-2 ">
                            <div>
                                <div class="fs-4 fw-semibold">{{ $lend }} </div>
                                <div>Total Lend</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row-->
        </div>
    </div>
@endsection
