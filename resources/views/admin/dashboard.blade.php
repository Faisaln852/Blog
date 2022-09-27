@extends('layouts.master')
@section('title','Admin Panel')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Panel</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">All Users</li>
    </ol>
    @if(session('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <table id="myDataTable" class="table table-striped" >
            <thead>
                <tr>
                    <td>User Name</td>
                    <td>Role</td>
                    <td>Email</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role_as == 1? 'Admin':'User'}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="/admin/dashboard/{{$user->id}}/edit" method="POST">
                            @csrf
                            @method('GET')
                            <button class="btn btn-outline-success">Edit</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection