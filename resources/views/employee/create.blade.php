@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if($errors->any())
                            <ul class="text-danger">
                                @foreach($errors->all() as $error)
                                   <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="post" action="{{ route('employees.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Contact Number</label>
                                <input type="text" name="telephone" class="form-control" id="telephone" aria-describedby="telephone">
                            </div>
                            <div class="mb-3">
                                <label for="working_route" class="form-label">Working Route</label>
                                <select class="form-control" name="working_route" id="working_route">
                                    <option selected="selected" disabled value="">Please Select</option>
                                    @foreach($working_routes as $working_route)
                                        <option value="{{$working_route}}">{{$working_route}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="joined_date" class="form-label">Joined Date</label>
                                <input type="date" name="joined_date" class="form-control" id="joined_date" aria-describedby="joined_date">
                            </div>
                            <div class="mb-3">
                                <label for="manager_comment" class="form-label">Manager Comment</label>
                                <textarea class="form-control" name="manager_comment" id="manager_comment" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
