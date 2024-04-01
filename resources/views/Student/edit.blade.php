@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">Update Student</div>
        <div class="card-body">
          <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <br>

            <div class="form-group">
              <div style="display: flex; justify-content: center; align-items: center; border: 1px solid black; width: 150px; height: 150px; overflow: hidden;">
                <img src="{{ asset('photos/'.$student->picture) }}" alt="{{ $student->full_name }}" width="150">
              </div> 
            </div> 

            <br>
            
            <div class="form-group">
              <label for="full_name">Full Name</label>
              <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $student->full_name }}" required>
            </div>
            
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" name="phone" id="phone" class="form-control" value="{{ $student->phone }}" required>
            </div>
            
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
            </div>

            <div class="form-group">
              <label for="picture">Picture</label>
              <input type="file" name="picture" id="picture" class="form-control form-control-sm" accept="image/*">          
              {{-- <img src="{{ asset('photos/'.$student->picture) }}" alt="{{ $student->full_name }}" width="150" class="mt-3"> --}}
            </div>

            <div class="form-group">
              <label for="school">School</label>
              <input type="text" name="school" id="school" class="form-control" value="{{ $student->school }}" required>
            </div>
            
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $student->start_date }}" required>            
            </div>

            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $student->end_date }}" required>
            </div>

            <div class="form-group">
              <label for="field_id">Field</label>
              <select name="field_id" id="field_id" class="form-control" required>
                  <option value="">-- Select Field --</option>
                  @foreach($fields as $field)
                      <option value="{{ $field->id }}" {{ $field->id == $student->field_id ? 'selected' : '' }}>{{ $field->name }}</option>
                  @endforeach
              </select>
          </div>
{{-- 
          <div class="form-group">
            <label for="encadrement_id">Encadrement</label>
            <select name="encadrement_id" id="encadrement_id" class="form-control" required>
                <option value="">-- Select Encadrement --</option>
                @foreach($encadrements as $encadrement)
                    <option value="{{ $encadrement->id }}" {{ $encadrement->id == $student->encadrements->first()->id ? 'selected' : '' }}>{{ $encadrement->name }}</option>
                @endforeach
            </select>
        </div> 
--}}

<div class="form-group">
  <label for="encadrements">Encadrements:</label>
  @foreach($encadrements as $encadrement)
      <div class="form-check">
          <input class="form-check-input" type="checkbox" name="encadrements[]" value="{{ $encadrement->id }}" id="encadrement_{{ $encadrement->id }}" {{ in_array($encadrement->id, $student->encadrements->pluck('id')->toArray()) ? 'checked' : '' }}>
          <label class="form-check-label" for="encadrement_{{ $encadrement->id }}">
              {{ $encadrement->name }}
          </label>
      </div>
  @endforeach
</div>


    
      
        
        <br>
        
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
</div>
        
@endsection