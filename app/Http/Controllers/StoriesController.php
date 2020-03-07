<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoriesController extends Controller
{

    public function index(Request $request)
    {

        $stories = Story::query()
        ->orderBy('created_at','desc')
        ->paginate(2);

        return view('stories.story-index')
        ->with('stories', $stories);
        // ->withStories($stories);
        // return view('stories.story-index',compact('stories'));



    }

    public function create(){

        return view('stories.story-add');


    }

    public function store(Request $request){

        $postData = $this->validate($request,[
            'title' => 'required | min:3',
            'story_type' =>'required',

        ]);

        // $postData['user_id'] = Auth::user()->id;
        $postData['user_id'] = $request->user()->id;
        $postData['epic_id'] = 1;

        $story = Story::create($postData);

        return redirect()->route('story.list');
    }

}
// $ touch resources/views/stories/story-index.blade.php
