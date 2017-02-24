@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('delete_status'))
                <div class="alert alert-success">
                    {{ session('delete_status') }}
                </div>
            @endif
            @if (session('update_status'))
                <div class="alert alert-success">
                    {{ session('update_status') }}
                </div>
            @endif
            @if($blogposts->count())
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($blogposts as $blogpost)
                    <tr>
                        <td>{{ $blogpost->id }}</td>
                        <td>{{ $blogpost->title }}</td>
                        <td>{{ str_limit($blogpost->body, 75) }}</td>
                        <td>{{ $blogpost->created_at->format('d-m-Y') }}</td>
                        <td><a href="/blogpost/{{$blogpost->id}}/edit">Edit</a></td>
                        <td><form action="/blogpost/{{$blogpost->id}}/delete" method="POST">{{csrf_field()}}<input type="submit" value="Delete"></form></td>
                    </tr>
                @endforeach
            </table>
            @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        <span>No posts yet.</span>
                        <a href="/blogpost/create">Create a post</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection