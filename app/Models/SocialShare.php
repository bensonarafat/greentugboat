<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialShare extends Model
{
    use HasFactory;

    protected $table = "socialshare";

    protected $fillable = [
        'postid',
        'socialid',
        'parentid',
        'link',
        'body',
        'type',
        'userid',
        'name',
        'picture'
    ];
}
