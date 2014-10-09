@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Tour</h1>
    </div>
    
    <form action="{{ action('TourController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $tour->id }}" />
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $tour->slug }}" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Tour Name</label>
            <input type="text" class="form-control" name="namefull" value="{{ $tour->namefull }}" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea class="form-control" name="description" rows="4">{{ $tour->description }}"</textarea>
        </div>
        <div class="form-group">
            <label for="timestart">Start date / time</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" value="{{ $tour->timestart }}" />
        </div>
        <div class="form-group">
            <label for="timeend">End date / time</label>
            <input type="text" id="endPicker" class="form-control" name="timeend" value="{{ $tour->timeend }}" />
        </div>
        <input type="submit" value="Edit" class="btn btn-primary" />
        <a href="{{ action('TourController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop