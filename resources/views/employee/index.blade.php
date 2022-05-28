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

                        <a href="/employees/create" class="btn btn-primary float-end">Add New</a>

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
                                    <td><a href="javascript:void(0)" id="{{$employee->id}}" class="btn_view_employee">View</a></td>
                                    <td><a href="/employees/{{$employee->id}}/edit">Edit</a></td>
                                    <td>
                                        <form method="post" action="{{route("employees.destroy", ['employee'=>$employee])}}">
                                            @method('Delete')
                                            @csrf
                                            <a href="javascript:void(0)" class="btn_delete_employee">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                    <td rowspan="6" class="text-center">No Employees</td>
                            @endforelse
                            </tbody>
                        </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="employeeShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Employee</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function () {
            $('.btn_delete_employee').click(function (e) {
                e.preventDefault();

                if (!confirm("Are you sure you want to delete this employee?")){
                    return;
                }

                $(this).closest('form').trigger('submit');
            })

            $('.btn_view_employee').click(function (e) {
                e.preventDefault();

                const modal = $("#employeeShowModal");
                const employee_id = $(this).attr('id');

                modal.find('div.modal-body').html("Loading..")
                modal.find('div.modal-body').load("/employees/"+employee_id);

                modal.modal('show');
            })
        });
    </script>
@endsection
