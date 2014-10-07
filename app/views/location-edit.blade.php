@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Location</h1>
    </div>
    
    <form action="{{ action('LocationController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $location->id }}" />
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $location->slug }}" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Location Name</label>
            <input type="text" class="form-control" name="namefull" value="{{ $location->namefull }}" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea  name="description" rows="4" cols="50">{{ $location->description }}"</textarea>
        </div>
        <div class="form-group">
            <label for="addr1">Address 1</label>
            <input type="text" class="form-control" name="addr1" value="{{ $location->addr1 }}" />
        </div>
        <div class="form-group">
            <label for="addr2">Address 2</label>
            <input type="text" class="form-control" name="addr2" value="{{ $location->addr2 }}" />
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" value="{{ $location->city }}" />
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" value="{{ $location->state }}" />
        </div>
        <div class="form-group">
            <label for="zip">Postal Code</label>
            <input type="text" class="form-control" name="zip" value="{{ $location->zip }}" />
        </div>
        <div class="form-group">
            <label for="email">Contact Email</label>
            <input type="text" class="form-control" name="email" value="{{ $location->email }}" />
        </div>
        <div class="form-group">
            <label for="phone">Contact Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $location->phone }}" />
        </div>
        <input type="submit" value="Edit" class="btn btn-primary" />
        <a href="{{ action('LocationController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop