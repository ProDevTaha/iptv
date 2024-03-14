<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs_images extends Model
{
    use HasFactory;
    public function blogs()
    {
        return $this->belongsTo(Blogs::class);
    }  

    protected $fillable = [
        'blog_id',
        'image'
    ];
}
