<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'position',
        'location',
        'salary',
        'deadline',
    ];

    public function applications()
    {
        return $this->hasMany(\App\Models\Application::class);
    }

}