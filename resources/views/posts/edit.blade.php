@extends("layouts/bloglayout")
@section("pagetitle")
    Edit Post
@endsection

@section("maincontent")
    <form class="form-control" action="{{route("posts.update",$post->id)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  value="{{$post->description}}" name="description" class="form-control" >
        </div>
        <div class="mb-3">
            <select class="form-select"  value="{{$post->user_id}}" name="user_id" aria-label="Default select example">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection

