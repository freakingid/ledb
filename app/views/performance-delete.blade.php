@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $performance->namefull }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('PerformanceController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="performance" value="{{ $performance->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('PerformanceController@index') }}" class="btn btn-default">No</a>
    </form>
@stop 