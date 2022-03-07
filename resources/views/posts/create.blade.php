@extends("layouts/bloglayout")
@section("pagetitle")
    Create Post
@endsection

@section("othercontent")
        <h1> Before main content section</h1>
@endsection

@section("maincontent")
    <form class="form-control" action="{{route("posts.store")}}" method="POST" >
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  name="description" class="form-control" >
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>
    </form>

@endsection


