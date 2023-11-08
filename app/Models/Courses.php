<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';

    /// Relationship
    public function category()
    {
        return $this->belongsTo(Category::class ,);
    }

    /// Handle Upload image
    public function  getImage()
    {
        if (!empty($this->image && file_exists('media/' .$this->image))) {
            return url('media/' .$this->image);
        } else {
            return "";
        }

    }
}
