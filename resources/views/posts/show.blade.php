@extends("layouts/app")
@section("pagetitle")
    Show Post
@endsection

@section("maincontent")
    <div class="card">
        <div class="card-header">
            Post Details
        </div>

        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            <p class="card-text">User: {{$post->author->name}}</p>
            <p class="card-text">Created at: {{$post->created_at}}</p>
            <p class="card-text">Updated at: {{$post->updated_at}}</p>


            <a href="{{route("posts.index")}}" class="btn btn-primary">Back to all posts</a>
        </div>
    </div>
@endsection


