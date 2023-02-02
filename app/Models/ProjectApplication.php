<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectApplication extends Model
{
    use HasFactory;


    protected $fillable = [
        'project_id',
        'user_id',
        'type',
        'description',
        'amount',
        'invoice',
        'cv',
    ];

    public static function hasVolunteer( $project_id){
        return ProjectApplication::where(['user_id' => auth()->user()->id, "type" => "volunteer", "project_id" => $project_id])->exists();
    }

    public static function hasVendor($project_id){
        return ProjectApplication::where(['user_id' => auth()->user()->id, "type" => "vendor", "project_id" => $project_id])->exists();
    }
}
