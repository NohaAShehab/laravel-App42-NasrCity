@extends("layouts/app")
@section("pagetitle")
    Posts index
@endsection
@section("maincontent")
    <div class="text-center">
        <td><a href="{{route("posts.create")}}" class="btn btn-success">Add New Post </a></td>

    </div>
    <table class="table">
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Description </th>
            <th> View </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
        @foreach($posts as $post)
{{--            @dump($post)--}}

            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>

                <td><a href="{{route("posts.show",$post["id"])}}" class="btn btn-info">View </a></td>
                @can("update",$post)
                    <td><a href="{{route("posts.edit",$post["id"])}}" class="btn btn-warning">Edit </a></td>
                @endcan

                <td>
                    <form action="{{route("posts.destroy",$post["id"])}}"  method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete"  class="btn btn-danger">
                    </form>
                </td>
{{--                <td><a href="{{route("posts.destroy",$post["id"])}}" class="btn btn-danger">Delete </a></td>--}}
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}

@endsection

