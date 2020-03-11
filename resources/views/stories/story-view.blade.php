@extends('layouts.app')

@section('pageTitle', "#{$story->id} {$story->title}")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2 class="mb-3">#{{$story->id}} {{$story->title}}</h2>
        </div>
        <div class="col-md-3">
            <button class="btn btn-warning btn-sm">Edit</button>
            <a href="{{ route('story.add') }}" class="btn btn-primary btn-sm">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="description">{!! $story->description !!}</div>
            <div id="comments-wrapper"></div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="border-bottom">
                <h5>Dates</h5>
                <p>
                    Created on <strong>{{$story->created_at}}</strong>
                    <br>
                    Due on <strong>{{$story->due_date}}</strong>
                </p>
            </div>

            <div class="border-bottom">
                <h5>Stroy data</h5>
                <p>
                    Story type <strong>{{$story->story_type}}</strong>
                    <br>
                    Story points <strong>{{$story->story_points}}</strong>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
