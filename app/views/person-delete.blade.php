@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $person->namefull }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('PersonController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="person" value="{{ $person->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('PersonController@index') }}" class="btn btn-default">No</a>
    </form>
@stop 