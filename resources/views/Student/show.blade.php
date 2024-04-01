@extends('layouts.app')

@section('content')
    
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">Student Details</div>
        <div class="card-body">

          <div class="form-group">
            <div style="display: flex; justify-content: center; align-items: center; border: 1px solid black; width: 150px; height: 150px; overflow: hidden;">
              <img src="{{ asset('photos/'.$student->picture) }}" alt="{{ $student->full_name }}" width="150">
            </div> 
          </div>

          <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $student->full_name }}" readonly>
          </div>
          
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $student->phone }}" readonly>
          </div>
          
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" readonly>
          </div>

          {{-- <div class="form-group">
            <label for="picture">Picture:</label>
            <img src="{{ asset('storage/' . $student->picture) }}" alt="{{ $student->full_name }}" class="img-thumbnail" style="max-width: 200px;">
          </div> --}}

          <div class="form-group">
            <label for="school">School:</label>
            <input type="text" name="school" id="school" class="form-control" value="{{ $student->school }}" readonly>
          </div>
          
          <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $student->start_date }}" readonly>            
          </div>

          <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $student->end_date }}" readonly>
          </div>
          
          <div class="form-group">
            <label for="field_id">Field:</label>
            <input type="text" name="field" id="field" class="form-control" value="{{ $student->field->name }}" readonly>
          </div>

          {{-- <div class="form-group">
            <label for="encadrement_id">Encadrement:</label>
              @foreach ($student->encadrements as $encadrement)
                <input type="text" name="encadrement" id="encadrement" class="form-control" value="{{ $encadrement->name }}" readonly>
              @endforeach
          </div> --}}

          <div class="form-group">
            <label for="encadrement_id">Encadrement:</label>
            <ul>
              @foreach ($student->encadrements as $encadrement)
                <li>{{ $encadrement->name }}</li>
              @endforeach
            </ul>
          </div>          
  
          <br>
          <div class="form-group">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection