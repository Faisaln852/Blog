@extends('layouts.master')
@section('title','Posts')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Post</li>
    </ol>
    @if(session('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
  {{session('message')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="row">
        <table id="myDataTable" class="table table-striped ">
            <thead>
                <tr>
                    <td>Post Name</td>
                    <td>Status</td>
                    <td>Description</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                
                    @foreach($posts as $post)
                    <tr>
                    <td>{{$post->name}}</td>
                    <td>{{$post->status == 1? 'Hidden':'Visible'}}</td>
                    <td>{!!$post->description!!}</td>
                    <td>
                        <form action="/admin/post/{{$post->id}}" method="POST">
                            @csrf
                            @method('Delete')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                    </td>
                    <td>
                        <form action="/admin/post/{{$post->id}}/edit" method="POST">
                            @csrf
                            @method('GET')
                        <button class="btn btn-outline-success">Edit</button>
                    </form>
                    </td>                </tr>
                    @endforeach
            
            </tbody>

        </table>
    </div>
</div>

@endsection