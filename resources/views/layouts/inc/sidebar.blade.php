<ul class="list-group ">
    <a href="{{url('admin/category/create')}}" class="list-group-item  {{Request::is('admin/category/create') ? 'active':''}}">Add Category</a>
    <a href="{{url('admin/category')}}" class="list-group-item  {{Request::is('admin/category') ? 'active':''}}">Categories</a>
    <a href="{{url('admin/post/create')}}" class="list-group-item  {{Request::is('admin/post/create') ? 'active':''}}">Add Post</a>
    <a href="{{url('admin/post')}}" class=" list-group-item  {{Request::is('admin/post') ? 'active':''}}">Posts</a>
</ul>