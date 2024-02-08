@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Add Organization</h2>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('organization.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <br>

        @if ($errors->any())
        <div class="alert alert-danger">
            Please check your inputs<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('organization.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                <label for="description">Email:</label>
                <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="description">Logo:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
