<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'slug',
        'content',
        'content_filtered',
        'author',
        'featureimage',
        'venue',
        'startdate',
        'enddate',
        'status'
    ];
}
