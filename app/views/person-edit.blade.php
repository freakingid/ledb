@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Edit Person</h1>
    </div>
    
    <form action="{{ action('PersonController@handleEdit') }}" method="post" role="form">
        <input type="hidden" name="id" value="{{ $person->id }}" />
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{ $person->username }}" />
        </div>
        <div class="form-group">
            <label for="namefirst">First Name</label>
            <input type="text" class="form-control" name="namefirst" value="{{ $person->namefirst }}" />
        </div>
        <div class="form-group">
            <label for="namelast">Last Name</label>
            <input type="text" class="form-control" name="namelast" value="{{ $person->namelast }}" />
        </div>
        <div class="form-group">
            <label for="dob">Birthday</label>
            <input type="text" id="startPicker" class="form-control" name="timestart" value="{{ $person->timestart }}" />
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" value="{{ $person->email }}" />
        </div>
        <input type="submit" value="Edit" class="btn btn-primary" />
        <a href="{{ action('PersonController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop