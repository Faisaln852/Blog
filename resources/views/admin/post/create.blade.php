@extends('layouts.master')
@section('title','Add Post')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <h4 class="card-header">
            <h4> Add Post</h4>
        </h4>
    </div>

    <div class="card-body">

        <form action="{{url('admin/post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 my-3">
                    <select class="form-select" name="category_id" required>
                        <option value="">-------select Any Catagory--------</option>
                    @foreach($categories as $category)    
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                        
                    </select>
                </div>
                <div class="col-md-6 my-3">
                    <label class="mb-2"> Post Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Post Name" required>
                </div>
                <div class="col-md-6 my-3">
                    <label class="mb-2">Slug</label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter Slug" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Description</label>
                    <textarea name="description" id="summernote" rows="3" class="form-control" placeholder="Enter Description " required></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Video Link</label>
                    <input type="text" name="yt_iframe" class="form-control" placeholder="Enter Embeded link here" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta " required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2"> Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control" placeholder="Enter Meta Description Here" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-12 my-3 d-flex justify-content-center">
                    <button class="btn btn-outline-success px-5">Sumbit</button>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection