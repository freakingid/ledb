@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $location->namefull }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('LocationController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="location" value="{{ $location->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('LocationController@index') }}" class="btn btn-default">No</a>
    </form>
@stop 