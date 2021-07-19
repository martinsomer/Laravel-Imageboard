<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Reply;

use App\Helpers\ImageSaver;

class ReplyController extends Controller {
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:255',
            'thread_id' => 'required|integer',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }
    
        if ($request->file('image') !== NULL) {
            $filename = time() . '.jpg';
            ImageSaver::save($request->file('image'), $filename);
        } else {
            $filename = NULL;
        }
    
        $reply = new Reply;
        $reply->comment = $request->comment;
        $reply->file_name = $filename;
        $reply->thread_id = $request->thread_id;
        $reply->save();
    
        return redirect()->back();
    }
}
