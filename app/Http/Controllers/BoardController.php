<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Thread;

class BoardController extends Controller {
    public function show($board_id) {
        $board = Board::select('id', 'name')
            ->where('id', '=', $board_id)
            ->with('threads')
            ->firstOrFail();
        
        return view('board', [
            'board' => $board
        ]);
    }
}
