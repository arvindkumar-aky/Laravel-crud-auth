@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Organization Details</h2>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('organization.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <br><br>
            <div class="todo-title">
                <strong>ID: </strong> {{ $organization->id }}
            </div>
            <br>
            <div class="todo-description">
                <strong>Name: </strong> {{ $organization->name }}
            </div>
            <br>
            <div class="todo-description">
                <strong>Email: </strong> {{ $organization->email }}
            </div>
            <div class="todo-description">
                <strong>Logo: </strong>
                <img src= {{ asset('storage/images/'.$organization->logo )}} class="img-fluid" style="min-width: 10px; min-height: 10px;">
            </div>
        </div>
    </div>
</div>
@endsection
