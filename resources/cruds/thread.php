<?php

use App\Models\Board;

return [
    'model' => App\Models\Thread::class,

    // searchable fields, if you dont want search feature, remove it
    'search' => ['id', 'subject', 'comment', 'board_id'],

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
        'subject' => 'required|max:32',
        'comment' => 'required|max:255',
        'board_id' => 'required|integer',
    ],

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    'fields' => [
        'subject' => 'text',
        'comment' => 'textarea',
        'board_id' => ['select' => Board::all()->pluck('name', 'id')->prepend('Select Board...', null)->toArray()],
    ],

    // Where files will store for inputs
    'store' => [],

    // which kind of data should be showed in list page
    'show' => ['id', 'subject', 'comment', 'file_name', 'board_id'],
];
