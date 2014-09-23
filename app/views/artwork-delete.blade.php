@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $artwork->namefull }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('ArtworkController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="artwork" value="{{ $artwork->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('ArtworkController@index') }}" class="btn btn-default">No</a>
    </form>
@stop 