@extends('layouts.app')

{{-- Update the content section --}}
@section('content')
    <a href="/posts" class="btn btn-primary">Go back</a>

    <h1>{{$post->title}}</h1>    
    <img style="width:100%; height:300px"  src="/storage/cover_images/{{$post->cover_image}}" alt="">
    <br><br>

    <div>
        {!!$post->body!!}
    </div>

    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    
    <hr>
    @if(!Auth::guest())      
        @if(Auth::user()->id == $post->user->id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            
            {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection