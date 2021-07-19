<?php

return [
    'model' => App\Models\Category::class,

    // searchable fields, if you dont want search feature, remove it
    'search' => ['id', 'name'],

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
    ],

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    'fields' => [
        'name' => 'text',
    ],

    // Where files will store for inputs
    'store' => [],

    // which kind of data should be showed in list page
    'show' => ['id', 'name'],
];
