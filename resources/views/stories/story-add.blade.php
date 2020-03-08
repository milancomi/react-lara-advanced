@extends('layouts.app')

@section('pageTitle',' -Add a new Story')
{{-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
@section('content')
<div class="container">

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <form action="{{url('/story/save')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title">
                    <div class="invalid-feedback"> {{$errors->first('title')}}</div>
                </div>

                <div class="form-group">
                    <label> Description</label>
                    <textarea type="text" class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>Assign user</label>
                    <select name="users[]" class="form-control" multiple>
                        <option value="bug" selected>Selected</option>
                        @foreach($users as $user)

                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach

                    </select>
                    {{$errors->first('users')}}
                </div>


                <div class="form-group">
                    <label>Story type</label>
                    <select name="story_type" class="form-control">
                        <option value="bug" selected>Bug</option>
                        <option value="enhancement" >Enhancement</option>
                        <option value="feature" >Feature</option>
                    </select>
                </div>
                <a href="{{route('story.list')}}" class="btn btn-danger">Back</a>
                <button class="btn btn-primary">Save </button>

            </form>
            </div>
        </div>
    </div>

@endsection
