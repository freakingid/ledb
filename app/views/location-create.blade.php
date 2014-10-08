@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Location</h1>
    </div>
    
    <form action="{{ action('LocationController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" />
        </div>
        <div class="form-group">
            <label for="namefull">Full Location Name</label>
            <input type="text" class="form-control" name="namefull" />
        </div>
        <div class="form-group">
            <label for="description">Description</label><br />
            <textarea name="description" rows="4" cols="50" placeholder="Describe this location for us."></textarea>
        </div>
        <div class="form-group">
            <label for="addr1">Address 1</label>
            <input type="text" class="form-control" name="addr1" />
        </div>
        <div class="form-group">
            <label for="addr2">Address 2</label>
            <input type="text" class="form-control" name="addr2" />
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" />
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" />
        </div>
        <div class="form-group">
            <label for="zip">Postal Code</label>
            <input type="text" class="form-control" name="zip" />
        </div>
        <div class="form-group">
            <label for="email">Contact Email</label>
            <input type="text" class="form-control" name="email" />
        </div>
        <div class="form-group">
            <label for="phone">Contact Phone</label>
            <input type="text" class="form-control" name="phone" />
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('LocationController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop