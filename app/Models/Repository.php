<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'repo_id',
        'name',
        'owner',
        'url',
        'repo_create',
        'last_push',
        'description',
        'stars'
    ];
}
