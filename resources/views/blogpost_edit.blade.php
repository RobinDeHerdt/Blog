@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/blogpost/{{$blogpost->id}}/update" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" rows="3" name="title" value="{{ $blogpost->title }}"></input>
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Content</label>
            <textarea class="form-control" rows="3" name="body">{{ $blogpost->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
