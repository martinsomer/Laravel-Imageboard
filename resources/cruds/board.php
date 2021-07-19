<?php

use App\Models\Category;

return [
    'model' => App\Models\Board::class,

    // searchable fields, if you dont want search feature, remove it
    'search' => ['id', 'name', 'category_id'],

    // Manage actions in crud
    'create' => true,
    'update' => true,
    'delete' => true,

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    'with_auth' => false,

    // Validation in update and create actions
    // It will use Laravel validation system
    'validation' => [
        'name' => 'required|max:32',
        'category_id' => 'required|integer',
    ],

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    'fields' => [
        'name' => 'text',
        'category_id' => ['select' => Category::all()->pluck('name', 'id')->prepend('Select Category...', null)->toArray()],
    ],

    // Where files will store for inputs
    'store' => [],

    // which kind of data should be showed in list page
    'show' => ['id', 'name', 'category_id'],
];
