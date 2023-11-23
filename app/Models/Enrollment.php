<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollment';

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function courses() {
        return $this->belongsTo(Courses::class);
    }

}
