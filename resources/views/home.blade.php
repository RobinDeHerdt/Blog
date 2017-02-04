@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($blogposts as $blogpost)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $blogpost->title }}</div>

                    <div class="panel-body">
                        {{ $blogpost->body }}
                        <a href="/blogpost/"{{$blogpost->id}}></a>
                    </div>
                    <div class="panel-footer"> 
                    Door {{ $blogpost->user->name }} | {{ $blogpost->created_at->format('d-m-Y H:i') }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
