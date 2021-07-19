<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model {
    protected $table = 'threads';

    public function board() {
        return $this->belongsTo(Board::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class)->orderBy('created_at', 'asc');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'comment',
        'board_id',
    ];
}
