@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">Fields</div>
          <div class="card-body">
            <div class="text-right">
                <a href="{{ route('fields.create') }}" class="btn btn-primary">Add Field</a>
            </div>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($fields as $field)
                  <tr>
                    <td>{{ $field->id }}</td>
                    <td>{{ $field->name }}</td>
                    <td>{{ $field->description }}</td>
                    <td>
                      <a href="{{ route('fields.edit', $field->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('fields.destroy', $field->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
