@extends("layouts/bloglayout")
@section("pagetitle")
    Edit Post
@endsection

@section("maincontent")
    <form class="form-control" action="#" >
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" value="{{$post["title"]}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  value="{{$post["desc"]}}" name="description" class="form-control" >
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection

