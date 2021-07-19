<?php

use App\Models\Thread;

return [
    'model' => App\Models\Reply::class,

    // searchable fields, if you dont want search feature, remove it
    'search' => ['id', 'comment', 'thread_id'],

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
        'comment' => 'required|max:255',
        'thread_id' => 'required|integer',
    ],

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    'fields' => [
        'comment' => 'text',
        'thread_id' => ['select' => Thread::all()->pluck('id', 'id')->prepend('Select Thread ID...', null)->toArray()],
    ],

    // Where files will store for inputs
    'store' => [],

    // which kind of data should be showed in list page
    'show' => ['id', 'comment', 'file_name', 'thread_id'],
];
