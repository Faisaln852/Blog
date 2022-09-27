@extends('layouts.app')
@section('content')
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4 class="mb-0">{!!$post->name!!}</h4>
                </div>
                <div class="mt-3">
                    <h6>{{$post->category->name.'/'.$post->name}}</h6>
                </div>
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        {!!$post->description!!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>
                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>
                </div>
                
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>
                </div>
                <div class="card mt-3">
                    <h4>Latest Posts</h4>
                </div>
                <div class="card-body">
                    @foreach($latest_posts as $latest_post_item) 
                    <a href="{{url('userfrontend/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                    <h6><span><i class="fa-sharp fa-solid fa-greater-than"></i></span> {{$latest_post_item->name}}</h6>
                    </a> 
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@endsection