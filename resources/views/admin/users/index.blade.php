@extends('layouts.main')

@section('title', 'Users')

@section('body')
    <div class="container">


        <div>
            <a href="{{ route('admin.users.create')}}" class="btn btn-primary">Create</a>
        </div>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td><a href="{{ route('admin.users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route('admin.users.show', $user->id)}}" class="btn btn-primary">SHOW</a></td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection