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

                        <a href="/employees/new" class="btn btn-primary float-end">Add New</a>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Current Route</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($my_employees as $employee)
                                <tr>
                                    <th scope="row">{{$employee->id}}</th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->telephone}}</td>
                                    <td>{{$employee->working_route}}</td>
                                    <td><a href="javascript:void(0)">View</a></td>
                                    <td><a href="/employees/{{$employee->id}}/edit">Edit</a></td>
                                    <td><a href="javascript:void(0)">Delete</a></td>
                                </tr>
                            @empty
                                    <td rowspan="6" class="text-center">No Employees</td>
                            @endforelse
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
