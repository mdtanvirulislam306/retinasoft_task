@extends('dashboard')
@section('content')

    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="col-sm-6 col-lg-8 m-auto">
                <div class="card mb-4">
                    <div class="card-header">Add User</div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div class="col-12">
                            <form action="{{route('users.store')}}" method="post">

                                @csrf
                                <div class="mb-3 ">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="enter name">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" placeholder="enter phone number">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="enter email address">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" placeholder="enter address">
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label">User Type</label>
                                    <select name="user_type" id="user_type" class="js-example-basic-single form-control @error('user_type') is-invalid @enderror ">
                                        @foreach($usertype as $user)
                                            <option value="{{$user}}">{{$user}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_type')
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
@push('scripts')
@endpush
