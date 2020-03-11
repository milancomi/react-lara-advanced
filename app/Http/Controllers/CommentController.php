<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request){
        $postData=$this->validate($request,[
            'comment' => 'required',
        ]);

        return $postData;
    }
}
