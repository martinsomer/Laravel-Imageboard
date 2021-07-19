<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Thread;

use App\Helpers\ImageSaver;

class ThreadController extends Controller {
    public function show($thread_id) {
        $thread = Thread::select('id', 'subject', 'comment', 'file_name', 'board_id', 'created_at')
            ->where('id', '=', $thread_id)
            ->with('board')
            ->with('replies')
            ->firstOrFail();

        return view('thread', [
            'thread' => $thread,
        ]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:32',
            'comment' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'board_id' => 'required|integer',
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
        
        $thread = new Thread;
        $thread->subject = $request->subject;
        $thread->comment = $request->comment;
        $thread->file_name = $filename;
        $thread->board_id = $request->board_id;
        $thread->save();
    
        return redirect()->back();
    }
}
