@extends('layouts.main')

@section('title', "Home")

@section('body')
    <div class="container">
        <h2>Register</h2>
        <div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone">
            </div>

            <div id="block-link" class="alert alert-success d-none" role="alert">
                Link: {{ url('/') }}/link/<span id="link"></span>
            </div>

            <div class="form-group">
                <button style="cursor:pointer" id="register" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
@endsection