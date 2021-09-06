@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="uper">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif

            <div class="row justify-content-end">
                <form action="{{ route('employees.index') }}" method="GET" style="margin-bottom: 20px;">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-success" value="Filter">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row justify-content-end">
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Company</td>
                        <td>Departments</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Staff ID</td>
                        <td>Address</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->departments }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->staff_id }}</td>
                            <td>{{ $employee->address }}</td>
                            <td><a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>no records</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $employees->links() }}
            <div>
                <div>
                @endsection
