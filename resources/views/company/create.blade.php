@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Add Company Data
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
                @if (session()->get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form method="post" action="{{ route('companies.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="country_name">Company Name:</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group">
                        <label for="symptoms">Email :</label>
                        <input type="text" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="cases">Address :</label>
                        <input type="text" class="form-control" name="address" />
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
