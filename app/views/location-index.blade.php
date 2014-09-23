@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Locations</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('LocationController@create') }}" class="btn btn-primary">Create Location</a>
        </div>
    </div>
    
    @if ($locations->isEmpty())
        <p>There are no locations! <small>BUMMER</small></p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Addr1</th>
                    <th>Addr2</th>
                    <th>City, State, Zip</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                <tr>
                    <td>{{ $location->slug }}</td>
                    <td>{{ $location->namefull }}</td>
                    <td>{{ $location->addr1 }}</td>
                    <td>{{ $location->addr2 }}</td>
                    <td>{{ $location->city }}, {{ $location->state }}&nbsp;{{ $location->zip }}</td>
                    <td>{{ $location->email }}</td>
                    <td>{{ $location->phone }}</td>
                    <td>
                        <a href="{{ action('LocationController@edit', $location->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('LocationController@delete', $location->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop