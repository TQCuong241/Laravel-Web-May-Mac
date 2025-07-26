<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'recruitment_id',
        'name', 'email', 'phone', 'address', 'message', 'cv_file', 'contacted'
    ];


}
