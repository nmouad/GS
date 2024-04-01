@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $encadrement->name }}</div>

                <div class="card-body">
                    <p><strong>Role:</strong> {{ $encadrement->description }}</p>

                    <h3>Students</h3>
                    <ul>
                        @foreach($encadrement->students as $student)
                            <li>{{ $student->full_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $encadrement->name }}</div>

                <div class="card-body">
                    <p><strong>Description:</strong> {{ $encadrement->description }}</p>

                    <h3>Students</h3>
                    <ul>
                        @foreach($encadrement->students as $student)
                            <li>{{ $student->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
