@extends('layouts.app')

@section('content')
<h1>Posts</h1>

@if(count($posts)>0)
@foreach ($posts as $post)
 <div>
    <div>
        <img style="width: 50%" src="storage/cover_images/{{$post->cover_image}}" alt="No Image"/>
        <br/>
        <br/>
    </div>
    <div>
        <h3><li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li></h3>
        <small>{{$post->created_at}} by {{$post->user->name}}</small>
    </div>
</div>   
@endforeach
@else
<P>No Posts found..</p>
@endif
@endsection
