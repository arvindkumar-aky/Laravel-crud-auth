@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Organizations List</h2>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('organization.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Organization</a>
            </div>
        </div>
        <br>

        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th width="5%">Id</th>
            <th width="5%">Name</th>
            <th width="5%"><center>Email</center></th>
            <th width="5%"><center>Logo</center></th>
            <th width="10%"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($organizations as $organization)
              <tr>
              <th>{{ $organization->id }}</th>
              <td>{{ $organization->name }}</td>
              <td><center>{{ $organization->email }}</center></td>
              <td><img src= {{ asset('storage/images/'.$organization->logo )}} class="img-fluid" style="min-width: 10px; min-height: 10px;"></td>
              <td>
                <div class="action_btn">
                  <div class="btn btn-info">
                    <a href="{{ route('organization.edit', $organization->id)}}" class="btn btn-warning">Edit</a>
                  </div>
                  <div class="btn btn-info">
                    <a href="{{ route('organization.show', $organization->id)}}" class="btn btn-warning">Show</a>
                  </div>
                  <div class="btn btn-info">
                    <form action="{{ route('organization.destroy', $organization->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @empty
              <tr>
              <td colspan="4"><center>No record found</center></td>
            </tr>
          @endforelse
        </tbody>
      </table>
        </div>
        <div class="d-flex justify-content-center">
            {{-- {!! $organizations->links() !!} --}}
        </div>

    </div>

</div>
@endsection
