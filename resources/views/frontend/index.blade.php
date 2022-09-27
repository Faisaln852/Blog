@extends('layouts.app')
@section('content')
<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise Here</h3>
        </div>
    </div>
</div>
<div class="my-5 py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Progaming Blog</h4>
                <div class="underline">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, asperiores magni? Nisi harum, similique reprehenderit laborum provident eos aspernatur corrupti?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, asperiores magni? Nisi harum, similique reprehenderit laborum provident eos aspernatur corrupti?
                </p>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline">
                </div>
            </div>
            @foreach($all_categories as $all_cateitems)
            <div class="col-md-3">
                <div class="card card-body mb-3">
                    <a href="{{url('userfrontend/'.$all_cateitems->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$all_cateitems->name}}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline">
                </div>
            </div>
            <div class="col-md-8">
                @foreach($latest_posts as $latest_post_item)
                <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{url('userfrontend/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$latest_post_item->name}}</h5>
                    </a>
                    <h6>Posted On: {{$latest_post_item->created_at->format('d-m-Y')}}</h6>

                </div>

                @endforeach

            </div>
            <div class="col-md-4">

            </div>

        </div>
    </div>
</div>
@endsection