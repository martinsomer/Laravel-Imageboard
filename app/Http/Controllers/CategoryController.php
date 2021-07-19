<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller {
    public function show() {
        $categories = Category::select('id', 'name')
            ->orderBy('name')
            ->with('boards')
            ->get();

        return view('index', [
            'categories' => $categories,
        ]);
    }
}
