@extends('layouts.master')
@section('title','Categories')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
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
                    <td>Category Name</td>
                    <td>Status</td>
                    <td>Description</td>
                    <td>Image</td>
                    <td>Delete</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                
                    @foreach($categories as $category)
                    <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->status == 1? 'Hidden':'Visible'}}</td>
                    <td>{{$category->description}}</td>
                    <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" style="width:100px;"></td>
                    <td>
                        <form action="/admin/category/{{$category->id}}" method="POST">
                            @csrf
                            @method('Delete')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                    </td>
                    <td>
                        <form action="/admin/category/{{$category->id}}/edit" method="POST">
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