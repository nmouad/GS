@extends('layouts.app')
@section('content')
    
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">Add New Student</div>
        <div class="card-body">
          <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data"> 
            @csrf 
            
            <div class="form-group">
              <label for="full_name">Full Name</label>
              <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" name="phone" id="phone" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="picture">Picture</label>
              <input type="file" name="picture" id="picture" class="form-control form-control-sm" required>            
            </div>

            <div class="form-group">
              <label for="school">School</label>
              <input type="text" name="school" id="school" class="form-control" required>
            </div>
            
            {{-- <div class="form-group">
              <label for="resume">Resume</label>
              <textarea name="resume" id="resume" rows="5" class="form-control" required></textarea>
            </div>

            <div class="form-group">
              <label for="topic">Internship Topic</label>
              <input type="text" name="topic" id="topic" class="form-control" required>
            </div> --}}
            
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="form-control" required>            
            </div>

            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label for="field_id">Field</label>
              <select name="field_id" id="field_id" class="form-control" required>
                <option value="">-- Select Field --</option>
                @foreach($fields as $field)
                <option value="{{ $field->id }}">{{ $field->name }}</option>
                @endforeach
              </select>
            </div>
            
            {{-- <div class="form-group">
              <label for="encadrement_id">Encadrement</label>
              <select name="encadrement_id" id="encadrement_id" class="form-control" required>
                <option value="">-- Select Encadrement --</option>
                @foreach($encadrements as $encadrement)
                <option value="{{ $encadrement->id }}">{{ $encadrement->name }}</option>
                @endforeach
              </select>
            </div> --}}


            <div class="form-group">
              <label for="encadrements">Encadrements:</label><br>
              @foreach($encadrements as $encadrement)
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="encadrement_{{ $encadrement->id }}" name="encadrements[]" value="{{ $encadrement->id }}">
                      <label class="form-check-label" for="encadrement_{{ $encadrement->id }}">{{ $encadrement->name }}</label>
                  </div>
              @endforeach
          </div>
          

            <br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection