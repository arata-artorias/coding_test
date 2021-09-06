@extends('layouts.app')

@section('content')
    {{-- <style>
  .uper {
    margin-top: 40px;
  }
</style> --}}
    <div class="container">
        <div class="card uper">
            <div class="card-header">
                Edit Company Data
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
                <form method="post" action="{{ route('companies.update', $company->id) }}">
                    <div class="form-group">
                        @csrf
                        @method('PATCH')
                        <label for="country_name">Country Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $company->name }}" />
                    </div>
                    <div class="form-group">
                        <label for="symptoms">Symptoms :</label>
                        <input type="text" class="form-control" name="email" value="{{ $company->email }}" />
                    </div>
                    <div class="form-group">
                        <label for="cases">Cases :</label>
                        <input type="text" class="form-control" name="address" value="{{ $company->address }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
