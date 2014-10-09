@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All People</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('PersonController@create') }}" class="btn btn-primary">Create Person</a>
        </div>
    </div>
    
    @if ($people->isEmpty())
        <p>There are no people! <small>BUMMER</small></p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($people as $person)
                <tr>
                    <td>{{ $person->username }}</td>
                    <td>{{ $person->namefirst }} {{ $person->namelast}}</td>
                    <td>{{ $person->dob }}</td>
                    <td>{{ $person->email }}</td>
                    <td>
                        <a href="{{ action('PersonController@edit', $person->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('PersonController@delete', $person->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop