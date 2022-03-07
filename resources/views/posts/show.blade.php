@extends("layouts/bloglayout")
@section("pagetitle")
    Show Post
@endsection

@section("maincontent")
    <div class="card">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <a href="{{route("posts.index")}}" class="btn btn-primary">Back to all posts</a>
        </div>
    </div>
@endsection


