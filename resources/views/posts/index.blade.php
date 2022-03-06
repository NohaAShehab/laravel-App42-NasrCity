<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ITI Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/posts">All posts</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
{{--@dd($posts)--}}
<div class="container">
    <div class="text-center">
        <td><a href="/posts/create" class="btn btn-success">Add New Post </a></td>

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
            <tr>
                <td>{{$post["id"]}}</td>
                <td>{{$post["title"]}}</td>
                <td>{{$post["desc"]}}</td>
                <td><a href="/posts/{{$post['id']}}" class="btn btn-info">View </a></td>
                <td><a href="#" class="btn btn-warning">Edit </a></td>
                <td><a href="#" class="btn btn-danger">Delete </a></td>
            </tr>
        @endforeach

    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

