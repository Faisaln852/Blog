@extends('layouts.master')
@section('title','Edit Cateogry')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <h4 class="card-header">
            <h4> Edit Category</h4>
        </h4>
    </div>

    <div class="card-body">

        <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 my-3">
                    <label class="mb-2"> Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{$category->name}}" required>
                </div>
                <div class="col-md-6 my-3">
                    <label class="mb-2">Slug</label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter Slug" value="{{$category->slug}}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Description</label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Enter Description" required>{{$category->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title " value="{{$category->meta_title}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="{{$category->meta_keywords}}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2"> Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control" placeholder="Enter Meta Description Here" required>{{$category->meta_description}}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="mb-2"> Navbar Status</label>
                    <input type="checkbox" name="navbar_status" {{$category->navbar_status ==1? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Status</label>
                    <input type="checkbox" name="status" {{$category->status == 1 ? 'checked':''}}>
                </div>
                @if($category->image)
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Image</label>
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" width="w-50">
                </div>
                @endif
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Image</label>
                    <input type="file" name="image" class="btn btn-outline-info">
                </div>
                <div class="col-md-12 my-3 d-flex justify-content-center">
                    <button class="btn btn-outline-success px-5">Sumbit</button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection