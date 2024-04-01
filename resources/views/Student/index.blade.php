@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Internship Management System</h1>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <form action="{{ route('search') }}" method="get" class="form-inline">
                    @csrf 
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control mr-2" placeholder="Search by name or field" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        {{-- <form action="{{ route('search') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search by name or field">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
</form> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Field</th>
                    <th>Encadrement</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                {{-- @foreach($students as $student) --}}
                <tr>
                    <td class="text-center">
                        <img src="{{ asset('photos/'.$student->picture) }}" alt="{{ $student->full_name }}" class="img-fluid"  style="max-width: 50px; max-height: 30px; border-radius: 50%">
                    </td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->field->name }}</td>
                    {{-- <td>{{ $student->encadrement->name }}</td> --}}
                    <td>        
                        @foreach($student->encadrements as $encadrement)
                        <li>{{ $encadrement->name }}</li>
                        @endforeach
                    </td>
                    <td>{{ \Carbon\Carbon::parse($student->start_date)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->end_date)->format('Y-m-d') }}</td>

                    {{-- <td>{{ $student->start_date->format('Y-m-d') }}</td>
                    <td>{{ $student->end_date->format('Y-m-d') }}</td> --}}
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

       <div class="d-flex justify-content-center">
            {{-- {{ $students->links() }}  --}}
            
                {{ $students->appends(request()->except('page'))->links() }}

            {{-- {{ $students->appends(['search' => $search])->links() }} --}}
        </div>

    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

@endsection
