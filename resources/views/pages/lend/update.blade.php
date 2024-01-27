@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="col-sm-6 col-lg-8 m-auto">
                <div class="card mb-4">
                    <div class="card-header">Update Lend</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div class="col-12">
                            <form action="{{route('lend.update',[$lend->id])}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="mb-3 ">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" id="title" value="{{old('title', isset($lend->title)?$lend->title:'')}}" class="form-control @error('title') is-invalid @enderror" placeholder="enter title">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Amount</label>
                                    <input type="text" name="amount" id="amount" value="{{old('amount', isset($lend->amount)?$lend->amount:'')}}" class="form-control @error('amount') is-invalid @enderror" placeholder="enter amount">
                                    @error('amount')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label">Debtor</label>
                                    <select name="user_id" id="debtor" class="js-example-basic-single form-control @error('user_id') is-invalid @enderror ">
                                        @foreach($users as $user)
                                            <option @if($lend->debtors->name==$user->name) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Issue Date</label>
                                    <input type="date" name="issue_date" id="issue_date" value="{{old('date', isset($lend->issue_date)?$lend->issue_date:'')}}" class="form-control @error('date') is-invalid @enderror">
                                    @error('issue_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Due Date</label>
                                    <input type="date" name="due_date" id="issue_date" value="{{old('due_date', isset($lend->due_date)?$lend->due_date:'')}}" class="form-control @error('due_date') is-invalid @enderror">
                                    @error('due_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Status</label>
                                    <select name="status" id="status" class="js-example-basic-single form-control @error('status') is-invalid @enderror ">
                                        @foreach($status as $st)
                                            <option @if($lend->status==$st) selected @endif value="{{$st}}">{{$st}}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <button type="submit" class="btn btn-primary"> Update </button>
                                    <button type="reset" class="btn btn-danger"> Reset </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
