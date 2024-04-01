@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Encadrements</h1>
        <a href="{{ route('encadrements.create') }}" class="btn btn-primary mb-3">Nouvel encadrement</a>
        @if($encadrements->count())
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($encadrements as $encadrement)
                        <tr>
                            <td>{{ $encadrement->id }}</td>
                            <td>{{ $encadrement->name }}</td>
                            <td>{{ $encadrement->description }}</td>
                            <td>
                                <a href="{{ route('encadrements.show', $encadrement->id) }}" class="btn btn-info btn-sm">Afficher</a>
                                <a href="{{ route('encadrements.edit', $encadrement->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('encadrements.destroy', $encadrement->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun encadrement trouvé.</p>
        @endif
    </div>
@endsection
