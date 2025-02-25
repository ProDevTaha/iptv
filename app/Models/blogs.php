<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Blogs_images::class);
    }
    protected $fillable =  ['title','description'];
}
