<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'date', 'username'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'username', 'username');
    }
}
