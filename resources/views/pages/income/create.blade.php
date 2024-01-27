@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="col-sm-6 col-lg-8 m-auto">
                <div class="card mb-4">
                    <div class="card-header">Add Income</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div class="col-12">
                            <form action="{{route('income.store')}}" method="post">

                                @csrf
                                <div class="mb-3 ">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="enter title">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Amount</label>
                                    <input type="text" name="amount" id="amount" value="{{old('amount')}}" class="form-control @error('amount') is-invalid @enderror" placeholder="enter amount">
                                    @error('amount')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label">Customer</label>
                                    <select name="user_id" id="customer" class="js-example-basic-single form-control @error('user_id') is-invalid @enderror ">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" id="date" value="{{old('date')}}" class="form-control @error('date') is-invalid @enderror">
                                    @error('date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <button type="submit" class="btn btn-primary"> Submit </button>
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
