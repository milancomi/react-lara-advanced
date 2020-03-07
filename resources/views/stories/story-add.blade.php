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
                    <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title">
                    <div class="invalid-feedback"> {{$errors->first('title')}}</div>
                </div>

                <div class="form-group">
                    <select name="story_type" class="form-control">
                        <option value="bug" selected>Bug</option>
                        <option value="enhancement" >Enhancement</option>
                        <option value="feature" >Feature</option>
                    </select>

                </div>


                <button class="btn btn-primary">Save </button>

            </form>
            </div>
        </div>
    </div>

@endsection
