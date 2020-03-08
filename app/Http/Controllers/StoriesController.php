<?php

namespace App\Http\Controllers;

use App\User;
use App\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::query()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('stories.story-index')
            ->with('stories', $stories);
    }

    public function view($id)
    {
        $story = Story::query()
            ->where('id', $id)
            ->first();

        return view('stories.story-view')
            ->with('story', $story);
    }

    public function create()
    {
        $users = User::query()->orderBy('name')->get();

        return view('stories.story-add')
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $postData = $this->validate($request, [
            'title' => 'required|min:3',
            'story_type' => 'required',
            'description' => 'required|min:3',
            'users' => ['array', function($field, $value) {
                $count = User::query()->whereIn('id', $value)->count();
                return count($value) === $count;
            }],
        ]);

        $postData['user_id'] = $request->user()->id;
        $postData['epic_id'] = 1;
        $userIds = $postData['users'];
        unset($postData['users']);

        $story = Story::create($postData);

        $data = [];
        foreach ($userIds as $id) {
            $data[] = [
                'user_id' => $id,
            ];
        }

        $story->users()->createMany($data);

        return redirect()->route('story.list');
    }
}
