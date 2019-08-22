@extends('layouts.main')

@section('body')
    <div class="container">
        <div class="card-header">
            SHow User
        </div>
        <div class="card-body">

                <div class="form-group">
                    Name: {{ $user->name }}
                </div>
                <div class="form-group">
                    Phone: {{ $user->phone }}
                </div>
        </div>
    </div>
@endsection