<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model {
    public $timestamps = false;
    protected $table = 'boards';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function threads() {
        return $this->hasMany(Thread::class)->withCount('replies')->orderBy('created_at', 'asc');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
    ];
}
