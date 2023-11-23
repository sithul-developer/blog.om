<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Courses extends Model
{
    use HasFactory;
    protected $fillable  =['user_profile', 'image', 'title', 'description','prices','category_id','name','status','Is_deleted',];

    /// Relationship
    public function category()
    {
        return $this->belongsTo(Category::class ,);
    }



    public function video()
    {
        return $this->belongsTo(Videos::class, );
    }


    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }

    /// Handle Upload image
    public function  getImage()
    {
        if (!empty($this->image && file_exists('storage//media/'.$this->image))) {
            return asset('storage//media/'.$this->image);
        } else {
            return "";
        }

    }
}
/*  */
/* storage\app\media\Screenshot 2023-10-30 101002.png */
