@extends('layout')

@section('content')
    <div class="page-header">
        <h1>All Performances</h1>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ action('PerformanceController@create') }}" class="btn btn-primary">Create Performance</a>
        </div>
    </div>
    
    @if ($performances->isEmpty())
        <p>There are no performances! <small>BUMMER</small></p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($performances as $performance)
                <tr>
                    <td>{{ $performance->slug }}</td>
                    <td>{{ $performance->namefull }}</td>
                    <td>{{ $performance->timestart }}</td>
                    <td>{{ $performance->rating }}</td>
                    <td>
                        <a href="{{ action('PerformanceController@edit', $performance->id) }}" class="btn btn-default">Edit</a>
                        <a href="{{ action('PerformanceController@delete', $performance->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@stop