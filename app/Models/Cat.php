<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'breed', 'gender', 'date_of_birth', 'image', 'introduction', 'created_at', 'updated_at'];


    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
