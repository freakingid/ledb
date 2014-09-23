@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Person</h1>
    </div>
    
    <form action="{{ action('PersonController@handleCreate') }}" method="post" role="form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" />
        </div>
        <div class="form-group">
            <label for="namefirst">First Name</label>
            <input type="text" class="form-control" name="namefirst" />
        </div>
        <div class="form-group">
            <label for="namelast">Last Name</label>
            <input type="text" class="form-control" name="namelast" />
        </div>
        <div class="form-group">
            <label for="dob">Birthday</label>
            <input type="text" class="form-control" name="timestart" value="Replace with datepicker" />
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" />
        </div>
        <input type="submit" value="Create" class="btn btn-primary" />
        <a href="{{ action('PersonController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop