@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Edit Employee Data
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('employees.update', $employee->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="country_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" />
                    </div>
                    <div class="form-group">
                        <label for="country_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name }} " />
                    </div>
                    <div class="form-group">
                        <label for="country_name">Company:</label>
                        <select name="company_id" class="form-control">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if ($company->id == $employee->company_id) selected @endif>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country_name">Departments:</label>
                        <input type="text" class="form-control" name="departments"
                            value="{{ $employee->departments }}" />
                    </div>
                    <div class="form-group">
                        <label for="symptoms">Email :</label>
                        <input type="text" class="form-control" name="email" value="{{ $employee->email }}" />
                    </div>
                    <div class="form-group">
                        <label for="symptoms">Phone :</label>
                        <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" />
                    </div>
                    <div class="form-group">
                        <label for="symptoms">Staff ID :</label>
                        <input type="text" class="form-control" name="staff_id" value="{{ $employee->staff_id }}" />
                    </div>
                    <div class="form-group">
                        <label for="cases">Address :</label>
                        <input type="text" class="form-control" name="address" value="{{ $employee->address }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
