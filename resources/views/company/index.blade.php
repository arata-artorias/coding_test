@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="uper">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Company Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->address }}</td>
                            <td><a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <div>
                @endsection
