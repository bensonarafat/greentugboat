<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'start_date',
        'deadline',
        'story',
        'budget',
        'images',
        'category_id',
        'vendor_id',
        'volunteer_id',
        'sponsor_id',
        'supervisor_id',
        'content_filtered',
        'featureimage',
        'priority',
        'volunteer'
    ];

}
