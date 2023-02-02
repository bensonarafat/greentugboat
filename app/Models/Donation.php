<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'amount',
        'image',
        'description',
        "status",
    ];

    public static function hasDonated( $project_id){
        return Donation::where(['user_id' => auth()->user()->id, "project_id" => $project_id])->exists();
    }
}
