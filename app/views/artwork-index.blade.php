@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Artworks <small>Groovy!</small></h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('ArtworkController@create') }}" class="btn btn-primary">Create Artwork</a>
        </div>
    </div>
    
    @if ($artworks->isEmpty())
        <p>There are no artworks! <small>BUMMER</small></p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artworks as $artwork)
                <tr>
                    <td>{{ $artwork->slug }}</td>
                    <td>{{ $artwork->namefull }}</td>
                    <td>
                        <a href="{{ action('ArtworkController@edit', $artwork->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('ArtworkController@delete', $artwork->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop