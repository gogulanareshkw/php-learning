@extends('layouts.app')

@section('content')
<h1>Post Details</h1>

<div>
    <a href="/posts">Go Back</a>
    <h3>{{$post->title}}</h3>
    <h3>{{$post->cover_image}}</h3>
    <img style="width: 50%" src="storage/cover_images/{{$post->cover_image}}" alt="No Image"/>
    <br/>
    <br/>
    <small>{{$post->created_at}}</small>
    <div>
        <p>{{$post->body}}</p>
    </div>   
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user->id)
    <a href="/posts/{{$post->id}}/edit">Edit</a>
    {!! Form::open(["action"=> ['PostsController@destroy',$post->id], 'method'=>'POST', 'class'=>'pull-right' ] ) !!}
    {{Form::hidden('_method',"DELETE")}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
    @endif
</div>   

@endsection
