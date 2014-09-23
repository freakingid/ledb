@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $tour->namefull }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('TourController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="tour" value="{{ $tour->id }}" />
        <input type="submit" class="btn btn-danger" value="Yes" />
        <a href="{{ action('TourController@index') }}" class="btn btn-default">No</a>
    </form>
@stop 