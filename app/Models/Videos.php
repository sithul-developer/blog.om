<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Videos extends Model
{
    use HasFactory;
    protected $table = 'videos';



    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function  getVideo()
    {
        if (!empty($this->videos && file_exists('media/' . $this->videos))) {
            return url('media/' . $this->videos);
        } else {
            return "";
        }
    }
}
